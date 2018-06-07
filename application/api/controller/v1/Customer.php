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
    private function validParam(){
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $token = "2b21";
        $tmpArr = array($token, $timestamp, $nonce);

        sort($tmpArr);
        $tmpStr = implode('',$tmpArr);

        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature){
            echo $_GET['echostr'];
            exit;
        }
        else{
            return false;
        }
    }
}