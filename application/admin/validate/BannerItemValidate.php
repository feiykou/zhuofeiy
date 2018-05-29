<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28 0028
 * Time: 上午 10:49
 */

namespace app\admin\validate;


class BannerItemValidate extends BaseValidate
{
    protected $rule = [
        'name' =>"require|isNotEmpty",
        'img_id' =>"require",
        'key_word' =>"require",
        'type' =>"require",
        'banner_id' =>"require",
    ];

    protected $message = [
        'name' => '分类不能为空',
        'img_id' => '不能为空',
        'key_word' => '不能为空',
        'type' => '不能为空',
        'banner_id' => '不能为空'
    ];
}