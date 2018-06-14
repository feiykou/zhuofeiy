<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 下午 17:49
 */

namespace app\api\service;


use app\api\model\AppUser as AppUserModel;
use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code){
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config("wx.login_url"),
            $this->wxAppID,$this->wxAppSecret,$code);
    }

    public function get(){
        $result = curl_get($this->wxLoginUrl);
        // true代表返回数组，默认是false返回的是对象
        $wxResult = json_decode($result, true);
        if(empty($wxResult)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }else{
            $loginFail = array_key_exists('errcode', $wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }else{
                // 生成令牌
                $token = $this->grantToken($wxResult);
            }
        }
        return $token;
    }

    private function grantToken($wxResult){
        // 拿到openid
        $openid = $wxResult['openid'];
        // 查询数据库，查看openid是否存在，存在不处理，不存在则新增一条user记录
        $user = AppUserModel::getByOpenID($openid);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }
        // 准备缓存数据，写入缓存
        $cachedValue = $this->prepareCachedValue($wxResult, $uid);
        // 把令牌返回客户端
        $token = $this->saveToCache($cachedValue);
        return $token;
    }

    /**
     * 生成并缓存token
     * @param $cachedValue
     * @throws TokenException
     */
    private function saveToCache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');
        $request = cache($key, $value, $expire_in);
        if(!$request){
            throw new TokenException([
                'msg'   =>   '服务器异常',
                'errorcode'  =>  10005
            ]);
        }
        return $key;
    }

    private function prepareCachedValue($wxResult, $uid){
        $cachedValue = $wxResult;
        $cachedValue['uid']  =  $uid;
        // scope=16 代表APP用户的权限数值
        $cachedValue['scope']  = ScopeEnum::User;
        return $cachedValue;
    }

    /**
     * 把openid写入数据库
     * @param $openid   openid
     * @return id     返回id
     */
    private function newUser($openid){

       $user = AppUserModel::create([
            'openid' => $openid
        ]);
       return $user->id;
    }

    /**
     * 错误记录
     *      --- 关于微信的错误定义一个方法，扩展方便
     *
     * @param $wxResult  微信返回的是信息
     * @throws WeChatException   微信错误异常处理
     */
    private function processLoginError($wxResult){
        var_dump(111);
        throw new WeChatException([
            'msg'         =>    $wxResult['errmsg'],
            'errorCode'   =>    $wxResult['errcode']
        ]);
    }
}