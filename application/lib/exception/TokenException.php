<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/18 0018
 * Time: 下午 15:02
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;

    public $msg = 'Token已过期或无效Token';

    public $errorCode = "10001";
}