<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 15:08
 */

namespace app\api\controller\v1;



use app\api\validate\IDMustBePostiveInt;
use app\api\validate\OrderPlace;
use app\api\service\Token as TokenService;
use app\api\service\Order as OrderService;
use app\api\model\Order as OrderModel;
use app\api\validate\PagingParameter;
use app\lib\exception\OrderException;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope'  =>  ['only' => 'placeOrder'],
        'checkPrimaryScope'    =>  ['only' => 'getDetail, getSummaryByUser']
    ];

    /**
     * @param int $page  分页数
     * @param int $size  一次分页展示数量
     * @return array
     * @throws \app\lib\exception\ParameterException
     * @throws \app\lib\exception\TokenException
     * @throws \think\Exception
     */
    public function getSummaryByUser($page=1, $size=15){
        (new PagingParameter())->goCheck();
        $uid = TokenService::getCurrentUid();
        $pagingOrders = OrderModel::getSummaryByUser($uid, $page, $size);
        if($pagingOrders->isEmpty()){
            return [
                'data'  =>  [],
                'current_page'  =>  $pagingOrders->getCurrentPage()
            ];
        }
        $data = $pagingOrders->hidden(['snap_items','snap_address','prepay_id'])->toArray();
        return [
            'data'  =>  $data,
            'current_page'  =>  $pagingOrders->getCurrentPage()
        ];
    }

    // 管理员是不能调用placeOrder接口，因为这个接口是给用户做的一个下单接口，管理员不应该有这个权限调用
    public function placeOrder(){
        (new OrderPlace())->goCheck();
        $products = input('post.products/a');
        $uid = TokenService::getCurrentUid();
        // 业务流程写在service中
        $order = new OrderService();
        $status = $order->place($uid, $products);
        return $status;
    }

    // 订单详情
    public function getDetail($id){
        (new IDMustBePostiveInt())->goCheck();
        $orderDetail = OrderModel::get($id);
        if(!$orderDetail){
            throw new OrderException();
        }
        return $orderDetail
            ->hidden(['prepay_id']);
    }
}