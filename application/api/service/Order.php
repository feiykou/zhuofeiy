<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 17:02
 */

namespace app\api\service;


use app\api\model\Product;
use app\lib\exception\OrderException;

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
    }

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
            array_push($status['pStatusArray'], $pStatus);
        }
        return $status;
    }

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