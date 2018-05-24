<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/24 0024
 * Time: 下午 14:40
 */

namespace app\api\validate;


class PagingParameter extends BaseValidate
{
    protected $rule = [
        'page'   =>   'isPositiveInteger',
        'size'   =>   'isPositiveInteger'
    ];

    protected $message = [
        'page'   =>   '分页参数必须是正整数',
        'size'   =>   '分页数量必须是正整数'
    ];
}