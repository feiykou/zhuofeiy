<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 17:02
 */

namespace app\api\service;


use app\api\model\OrderProduct;
use app\api\model\Product;
use app\api\model\UserAddress;
use app\lib\exception\AppUserException;
use app\lib\exception\OrderException;
use think\Db;
use think\Exception;

class Order
{
    // 做库存量检测就是对比$oProducts和$products
    // 订单的商品列表，也就是客户端传递过来的products参数
    protected $oProducts;

    // 真实的product数据，是提供product_id查询出来的数据
    protected $products;

    protected $uid;

    public function place($uid, $oProducts){
        // oProducts和products进行对比
        // 第一步：从数据库查询出products
        $this->oProducts = $oProducts;
        $this->products = $this->getProductsByOrder($oProducts);
        $this->uid = $uid;

        $status = $this->getOrderStatus();
        if( !$status['pass'] ){
            $status['order_id'] = -1;
            return $status;
        }

        // 开始创建订单
        $orderSnap = $this->snapOrder($status);
        $order = $this->createOrder($orderSnap);
        $order['pass'] = true;
        return $order;
    }

    // 生成订单
    private function createOrder($snap){
        Db::startTrans();
        try{
            $orderNo = $this->makeOrderNo();
            $order = new \app\api\model\Order();
            $order->user_id = $this->uid;
            $order->order_no = $orderNo;
            $order->total_price = $snap['orderPrice'];
            $order->total_count = $snap['totalCount'];
            $order->snap_img = $snap['snapImg'];
            $order->snap_name = $snap['snapName'];
            $order->snap_address = $snap['snapAddress'];
            $order->snap_items = json_encode($snap['pStatus']);
            $order->save();

            $orderID = $order->id;
            $create_time = $order->create_time;

            foreach ($this->oProducts as &$p){
                $p['order_id'] = $orderID;
            }
            $orderProduct = new OrderProduct();
            $orderProduct->saveAll($this->oProducts);
            Db::commit();
            return [
                'order_no'  =>  $orderNo,
                'order_id'  =>  $orderID,
                'create_time' =>  $create_time
            ];
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

    }

    // 生成订单号
    public static function makeOrderNo()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn =
            $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        return $orderSn;
    }

    // 生成订单快照
    private function snapOrder($status){
        $snap = [
            'orderPrice' => 0,
            'totalCount' => 0,
            'pStatus'    => [],
            'snapAddress'=> null,
            'snapName'   => '',
            'snapImg'    => ''
        ];

        $snap['orderPrice'] = $status['orderPrice'];
        $snap['totalCount'] = $status['totalCount'];
        $snap['pStatus'] = $status['pStatusArray'];
        $snap['snapAddress'] = json_encode($this->getUserAddress());
        $snap['snapName'] = $this->products[0]['name'];
        $snap['snapImg'] = $this->products[0]['main_img_url'];
        if(count($this->products) > 1){
            $snap['snapName'] .= '等';
        }
        return $snap;
    }

    // 获取用户的地址
    private function getUserAddress(){
        $userAddress = UserAddress::where('user_id', '=', $this->uid)
            ->find();
        if(!$userAddress){
            throw new AppUserException([
                'msg'   =>   '用户收货地址不存在，下单失败',
                'errorCode' =>  60001
            ]);
        }
        return $userAddress->toArray();
    }

    // 对外提供库存量检测
    public function checkOrderStock($orderID){
        $oProducts = OrderProduct::where('order_id','=',$orderID)
            ->select();
        $this->oProducts = $oProducts;
        $this->products = $this->getProductsByOrder(oProducts);
        $status = $this->getOrderStatus();
        return $status;
    }

    // 获取提交的产品的状态
    private function getOrderStatus(){
        /*
         * 因为是一组产品，所以只要有一个产品库存检测不通过，那就全部不通过
         *
         * pass：订单的检测是否通过，默认是通过
         * pStatusArray：保存所有订单的详细信息，order传递过来只包含product_id，并没有product的详细信息
         */
        $status = [
            'pass' => true,
            'orderPrice' => 0,
            'totalCount' => 0,
            'pStatusArray' => []
        ];

        foreach ($this->oProducts as $oProduct) {
            $pStatus = $this->getProductStatus(
                $oProduct['product_id'], $oProduct['count'], $this->products
            );
            if(!$pStatus['haveStock']){
                $status['pass'] = false;
            }
            $status['orderPrice'] += $pStatus['totalPrice'];
            $status['totalCount'] += $pStatus['count'];
            array_push($status['pStatusArray'], $pStatus);
        }
        return $status;
    }

    // 获取一组产品的状态
    private function getProductStatus($oPID, $oCount, $products){

        // 判断产品是否存在数据库中
        $pindex = -1;

        /*
         * id：产品id
         * haveStock：是否有库存
         * count：订单产品数量
         * name：产品名
         * totalPrice：该产品总价格
         */
        $pstatus = [
            'id'          =>  null,
            'haveStock'   =>  false,
            'count'       =>  0,
            'name'        =>  '',
            'totalPrice'  =>  0
        ];

        for ($i=0; $i<count($products);$i++){
            if($oPID == $products[$i]['id']){
                $pindex = $i;
            }
        }

        if($pindex == -1){
            throw new OrderException([
                'msg' => 'id为'.$oPID.'的商品不存在，创建订单失败！'
            ]);
        }else{
            $product = $products[pindex];
            $pstatus['id'] = $product['id'];
            $pstatus['name'] = $product['name'];
            $pstatus['count'] = $oCount;
            $pstatus['totalPrice'] = $product['price'] * $oCount;
            if($product['stock'] - $oCount >= 0){
                $pstatus['haveStock'] = true;
            }
        }
        return $pstatus;
    }

    // 根据订单信息查找真实的商品信息
    private function getProductsByOrder($oProducts){
//        foreach ($oProducts as $oProduct){
//            // 这个地方会循环的查询数据库
//        }
        $oPIDs = [];
        foreach ($oProducts as $item){
            array_push($oPIDs, $item['product_id']);
        }
        $Products = Product::all($oPIDs)
            ->visible(['id','price','stock','name','main_img_url'])
            ->toArray();
        return $Products;
    }
}