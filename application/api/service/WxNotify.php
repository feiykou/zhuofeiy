<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23 0023
 * Time: 下午 19:13
 */

namespace app\api\service;

use app\api\model\Product;
use app\lib\enum\OrderStatusEnum;
use think\Db;
use think\Exception;
use think\Loader;
use app\api\model\Order as OrderModel;
use app\api\service\Order as OrderService;
use think\Log;

Loader::import('WxPay.WxPay',EXTEND_PATH,'Api.php');
class WxNotify extends \WxPayNotify
{
    public function NotifyProcess($data, &$msg)
    {
        // 1、检测库存量，超卖（可能性较小，因为前面已经检测库存量）
        // 2、更新订单的状态，order表中的status字段
        // 3、减库存
        // 4、如果成功处理，返回微信成功处理的信息，否则需要返回没有成功处理（微信会再次发送通知）
        /*
         *
         * <xml>
              <appid><![CDATA[wx2421b1c4370ec43b]]></appid>
              <attach><![CDATA[支付测试]]></attach>
              <bank_type><![CDATA[CFT]]></bank_type>
              <fee_type><![CDATA[CNY]]></fee_type>
              <is_subscribe><![CDATA[Y]]></is_subscribe>
              <mch_id><![CDATA[10000100]]></mch_id>
              <nonce_str><![CDATA[5d2b6c2a8db53831f7eda20af46e531c]]></nonce_str>
              <openid><![CDATA[oUpF8uMEb4qRXf22hE3X68TekukE]]></openid>
              <out_trade_no><![CDATA[1409811653]]></out_trade_no>
              <result_code><![CDATA[SUCCESS]]></result_code>
              <return_code><![CDATA[SUCCESS]]></return_code>
              <sign><![CDATA[B552ED6B279343CB493C5DD0D78AB241]]></sign>
              <sub_mch_id><![CDATA[10000100]]></sub_mch_id>
              <time_end><![CDATA[20140903131540]]></time_end>
              <total_fee>1</total_fee>
            <coupon_fee><![CDATA[10]]></coupon_fee>
            <coupon_count><![CDATA[1]]></coupon_count>
            <coupon_type><![CDATA[CASH]]></coupon_type>
            <coupon_id><![CDATA[10000]]></coupon_id>
            <coupon_fee><![CDATA[100]]></coupon_fee>
              <trade_type><![CDATA[JSAPI]]></trade_type>
              <transaction_id><![CDATA[1004400740201409030005092168]]></transaction_id>
            </xml>
         */

        // 支付成功的情况
        if($data['result_code'] == 'SUCCESS'){
            //有订单号，才能进行库存量的检测out_trade_no，预订单的时候传递了订单号
            $orderNo = $data['out_trade_no'];
            Db::startTrans();
            try{
                // lock() 对查询锁住，执行完之后再执行第二次
                $order = OrderModel::where('order_no','=',$orderNo)
                    ->lock(true)
                    ->find();
                // 我们只处理订单未被支付的情况,也就是status=1的情况
                if($order->status == 1){
                    $service = new OrderService();
                    $stockStatus = $service->checkOrderStock($order->id);
                    if($stockStatus['pass']){
                        // 可能发生的事情：一次订单，多次更新状态和减库存,使用事务，会先把内容锁住，执行之后，再解锁

                        // 更新状态
                        $this->updateOrderStatus($order->id, true);
                        // 减库存
                        $this->reduceStock($stockStatus);
                    }else{
                        $this->updateOrderStatus($order->id, false);
                    }
                }
                Db::commit();
                return true;
            }catch (Exception $ex){
                Db::rollback();
                Log::error($ex);
                return false;
            }
        }
        // 订单不成功
        else{
            return true;
        }
    }

    // 减库存
    private function reduceStock($stockStatus){
        //setDec自动减数量
        foreach ($stockStatus['pStatusArray'] as $singlePStatus){
            Product::where('id','=',$singlePStatus['id'])
                ->setDec('stock',$singlePStatus['count']);
        }
    }

    // 更新支付状态
    private function updateOrderStatus($orderID, $success){
        $status = $success?OrderStatusEnum::PAID : OrderStatusEnum::PAID_BUT_OUT_OF;
        OrderModel::where('id','=',$orderID)
            ->update(['status'=>$status]);
    }
}