<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/18 0018
 * Time: 下午 13:34
 */

namespace app\api\service;


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
}