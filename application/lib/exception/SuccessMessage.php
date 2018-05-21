<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 13:32
 */

namespace app\lib\exception;


class SuccessMessage extends BaseException
{
    public $code = 201;

    public $msg = 'ok';

    public $errorCode = 0;
}