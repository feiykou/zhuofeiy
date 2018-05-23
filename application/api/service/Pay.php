<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23 0023
 * Time: 下午 15:41
 */

namespace app\api\service;


use app\lib\enum\OrderStatusEnum;
use app\lib\exception\OrderException;
use app\lib\exception\TokenException;
use think\Exception;
use app\api\service\Order as OrderService;
use app\api\model\Order as OrderModel;
use think\Loader;
use think\Log;

// extend/WxPay/WxPay.Api.php
Loader::import('WxPay.WxPay',EXTEND_PATH,'Api.php');

class Pay
{
    private $orderID;
    private $orderNO;

    function __construct($orderID)
    {
        if(!$orderID){
            throw new Exception('订单号不允许为空');
        }
        $this->orderID = $orderID;
    }

    public function pay(){
        // 订单号不存在
        // 订单号确实存在，但是订单号和当前用户是不匹配的
        // 订单有可能已经被支付过
        $this->checkOrderValid();

        // 进行库存量检测
        $orderService = new OrderService();
        $status = $orderService->checkOrderStock($this->orderID);
        if(!$status['pass']){
            return $status;
        }
        return $this->makeWxPreOrder($status['orderPrice']);
    }

    // 向微信发送请求，进行预订单
    private function makeWxPreOrder($totalPrice){
        // 用户的openid --- 微信的身份标识
        $openid = Token::getCurrentTokenVar('openid');
        if(!$openid){
            throw new TokenException();
        }
        // 统一下单，如果一个类没有命名空间，一定要在类的前面加上一个\
        $wxOrderData = new \WxPayUnifiedOrder();
        //订单号
        $wxOrderData->SetOut_trade_no($this->orderNO);
        $wxOrderData->SetTrade_type('JSAPI');
        // 订单总金额，微信是以分作为单位
        $wxOrderData->SetTotal_fee($totalPrice*100);
        $wxOrderData->SetBody('卓儿');
        $wxOrderData->SetOpenid($openid);
        // 给一个地址，用于接收微信的回调通知
        $wxOrderData->SetNotify_url();
        return $this->getPaySignature($wxOrderData);
    }

    // 调用微信的预订单接口，向微信发送的请求方法位于WxPay.Api中
    private function getPaySignature($wxOrderData){
        $wxOrder = \WxPayApi::unifiedOrder($wxOrderData);
        if($wxOrder['return_code'] != 'SUCCESS' ||
            $wxOrder['result_code'] != 'SUCCESS'){
            Log::record($wxOrder,'error');
            Log::record('获取预支付订单失败','error');
        }
        // prepay_id 向用户推送一个模板消息
        $this->recordPreOrder($wxOrder);
        // 对微信传递的数据进行加工和新增
        $signature = $this->sign($wxOrder);
        return $signature;
    }

    // WxPayJsApiPay中有一个方法可以帮助生成签名
    private function sign($wxOrder){
        // 使用WxPayJsApiPay类返回客户端的一系列的参数
        $jsApiPayData = new \WxPayJsApiPay();
        $jsApiPayData->SetAppid(config('wx.app_id'));
        $jsApiPayData->SetTimeStamp((string)time());

        $rand = md5(time() . mt_rand(0,1000));
        $jsApiPayData->SetNonceStr($rand);

        $jsApiPayData->SetPackage('prepay_id='.$wxOrder['prepay_id']);
        $jsApiPayData->SetSignType('md5');

        // 生成签名
        $sign = $jsApiPayData->MakeSign();

        // 转换成数组
        $rawValues = $jsApiPayData->GetValues();
        $rawValues['paySign'] = $sign;

        // $rawValues中有appid，所以可以删除掉，因为返回到小程序也没有用
        unset($rawValues['appId']);
        return $rawValues;
    }

    // 对prepay_id进行更新操作
    private function recordPreOrder($wxOrder){
        OrderModel::where('id','=',$this->orderID)
            ->update(['prepay_id'=>$wxOrder['prepay_id']]);
    }


    // 检查订单和用户是否匹配，订单是否支付，订单是否存在
    private function checkOrderValid(){
        $order = OrderModel::where('id','=',$this->orderID)
            ->find();
        if(!$order){
            throw new OrderException();
        }
        if(!Token::isVaildOperate($order->user_id)){
            throw new TokenException([
                'msg'  =>  '订单和用户是不匹配的',
                'errorCode' => 10003
            ]);
        }
        if($order->status != OrderStatusEnum::UNPAID){
            throw new OrderException([
                'msg' => '订单已支付',
                'errorCode' => 80003,
                'code' => 400
            ]);
        }
        $this->orderNO = $order->order_no;
        return true;
    }
}