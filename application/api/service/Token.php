<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/18 0018
 * Time: 下午 13:34
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    public static function generateToken(){
        // 32个字符组成随机字符串
        $randChars = getRandChar(32);
        // 用三组字符串，进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        // salt 盐  --- 无意义的一串字符
        $salt = config('secure.token_salt');
        var_dump('timestamp='.$timestamp);
        var_dump('salt='.$salt);

        return md5($randChars . $timestamp . $salt);
    }

    /**
     * 通过token获取缓存中某个键对应的值
     * @param $key  键
     * @return mixed
     * @throws Exception
     * @throws TokenException
     */
    public static function getCurrentTokenVar($key){
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }
        if(!is_array($vars)){
            $vars = json_decode($vars,true);
        }
        if(array_key_exists($key, $vars)){
            return $vars[$key];
        }else{
            throw new Exception('尝试获取的token变量不存在');
        }
    }

    /**
     * 获取用户uid
     * @return mixed
     * @throws Exception
     * @throws TokenException
     */
    public static function getCurrentUid(){
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    // 用户和cms管理员都可以访问
    public static function needPrimaryScope(){
        $scope = self::getCurrentTokenVar('scope');

        // $scope可能是空值，所以要进行判断
        if($scope){
            if($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    // 只有用户可以访问
    public static function needExclusiveScope(){
        $scope = self::getCurrentTokenVar('scope');

        // $scope可能是空值，所以要进行判断
        if($scope){
            if($scope = ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    // 检测checkedID是否是当前用户的订单
    public static function isVaildOperate($checkedID){
        if(!$checkedID){
            throw new Exception('检查UID时必须传入一个被检查的UID');
        }
        $currentOperateUID = self::getCurrentUid();
        if($currentOperateUID == $checkedID){
            return true;
        }
        return false;
    }

    // 检测token是否存在缓存
    public static function verifyToken($token){
        $exit = Cache::get($token);
        if($exit){
            return true;
        }else{
            return false;
        }
    }
}