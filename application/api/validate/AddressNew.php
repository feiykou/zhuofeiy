<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 上午 11:38
 */

namespace app\api\validate;


class AddressNew extends BaseValidate
{
    protected $rule = [
        'name'       =>     'require|isNotEmpty',
        'mobile'     =>     'require|isMobile',
        'province'   =>     'require|isNotEmpty',
        'city'       =>     'require|isNotEmpty',
        'country'    =>     'require|isNotEmpty',
        'detail'     =>     'require|isNotEmpty',
    ];
}