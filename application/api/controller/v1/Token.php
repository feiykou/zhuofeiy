<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 下午 17:21
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code=""){
        (new TokenGet())->goCheck();
        $ut = new UserToken($code);
        $token = $ut->get();
        var_dump($token);
        return [
            'token' => $token
        ];
    }
}