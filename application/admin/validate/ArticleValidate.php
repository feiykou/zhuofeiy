<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/2/9 17:29
 *
 */

namespace app\admin\validate;


class ArticleValidate extends BaseValidate
{
    protected $rule = [
        'name' =>"require|isNotEmpty",
        'category_id' =>"require|iszeroInteger",
        'content' =>"require",
        "img_url" => "require",
        'click_num' =>"require|iszeroInteger",
    ];

    protected $message = [
        'name' => '标题不能为空',
        'category_id' => '分类id不能为空',
        'content' => '内容不能为空',
        'click_num' => '点击数不能为空',
        'img_url'   => '图片不能为空'
    ];

    /** 场景 **/
    protected $scene = [
        'add'    =>    ['id','title','category_id','content','img_url','click_num']
    ];
}