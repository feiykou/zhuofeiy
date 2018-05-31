<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1
 * Time: 0:02
 */

namespace app\lib\exception;


class ArticleException extends BaseException
{
    public $code = 401;

    public $msg = '请求的文章不存在';

    public $errorCode = '90000';
}