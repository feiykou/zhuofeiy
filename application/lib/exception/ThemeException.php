<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 13:55
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;

    public $msg = '指定主题不存在，请检查主题ID';

    public $errorCode = '30000';
}