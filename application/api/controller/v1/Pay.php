<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23 0023
 * Time: 下午 15:24
 */

namespace app\api\controller\v1;


use app\api\service\WxNotify;
use app\api\validate\IDMustBePostiveInt;
use app\api\service\Pay as PayService;

class Pay extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => 'getPreOrder'
    ];

    // 预订单  -- 只有用户可以访问，cms管理员不能访问
    public function getPreOrder($id=''){
        (new IDMustBePostiveInt())->goCheck();
        $pay = new PayService($id);
        return $pay->pay();
    }

    /**
     * 微信不只是调用receiveNotify一次，它会隔一段时间来调用一次
     * 通知频率：15/15/30/180/1800/1800/1800/3600，单位是秒，到3600就不会再发
     * 在没有收到服务器的正确响应结果的时候，会根据通知频率进行调用
     *
     * 微信提示：不能绝对保证每一次的请求会发送到服务器中
     *
     * 接口类型：post
     */
    public function receiveNotify(){

        /*
         * 首先要了解微信传递过来的参数特点
         * 1、接口类型是post
         * 2、xml格式发送数据
         * 3、问号后面的参数会直接过滤掉
         */

        // 1、检测库存量，超卖（可能性较小，因为前面已经检测库存量）

        // 2、更新订单的状态，order表中的status字段

        // 3、减库存

        // 4、如果成功处理，返回微信成功处理的信息，否则需要返回没有成功处理（微信会再次发送通知）
        $notify = new WxNotify();
        $notify->Handle();
    }
}