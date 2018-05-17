<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 13:55
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 401;

    public $msg = '请求的Banner不存在';

    public $errorCode = '40000';
}