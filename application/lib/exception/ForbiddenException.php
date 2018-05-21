<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 14:56
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;

    public $msg = '权限不够';

    public $errorCode = 10002;
}