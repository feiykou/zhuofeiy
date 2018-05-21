<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 上午 11:53
 */

namespace app\lib\exception;


class AppUserException extends BaseException
{
    public $code = 404;

    public $msg = '用户不存在';

    public $errorCode = 60000;
}