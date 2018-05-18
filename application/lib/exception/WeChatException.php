<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/18 0018
 * Time: 上午 10:31
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;

    public $msg = '微信服务器接口调用失败';

    public $errorCode = 999;
}