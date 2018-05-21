<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 17:32
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;

    public $msg = '订单不存在，请检查ID';

    public $errorCode = 80000;
}