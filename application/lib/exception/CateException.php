<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2017/12/18 10:56
 *
 */

namespace app\lib\exception;


class CateException extends BaseException
{
    public $code = 404;

    public $msg = "指定类目不存在，请检查参数";

    public $errorCode = 50000;
}