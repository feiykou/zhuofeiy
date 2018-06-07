<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/7 0007
 * Time: 下午 16:31
 */

namespace app\api\controller\v1;


class Customer
{
    public function validParam(){
        $signature = input('param.signature');
        $timestamp = input('param.timestamp');
        $nonce = input('param.nonce');

        $token = "2b21d0665720fdd4509ee7fad893420a";
        $tmpArr = [$token, $timestamp, $nonce];
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if($tmpStr == $signature){
            return true;
        }
        else{
            return false;
        }

    }
}