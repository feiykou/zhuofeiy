<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14 0014
 * Time: 下午 16:10
 */

namespace app\api\validate;


class Wxacode extends BaseValidate
{
    protected $rule = [
        'token' => 'require|isNotEmpty'
    ];

    protected $message = [
        'token' => '没有token，哪来的小程序码？'
    ];
}