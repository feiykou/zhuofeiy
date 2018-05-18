<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 下午 17:48
 */

namespace app\api\model;


class AppUser extends BaseModel
{
    public static function getByOpenID($openid){
        $result = self::where('openid','=',$openid)
            ->find();
        return $result;
    }
}