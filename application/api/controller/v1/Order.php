<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 15:08
 */

namespace app\api\controller\v1;



use app\api\validate\OrderPlace;
use app\api\service\Token as TokenService;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope'  =>  ['only' => 'placeOrder']
    ];

    // 管理员是不能调用placeOrder接口，因为这个接口是给用户做的一个下单接口，管理员不应该有这个权限调用
    public function placeOrder(){
        (new OrderPlace())->goCheck();
        $product = input('post.products/a');
        $uid = TokenService::getCurrentUid();
        // 业务流程写在service中

    }
}