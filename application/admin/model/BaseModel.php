<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 21:43
 */

namespace app\admin\model;


use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value){
        $finaUrl = $value;
        if(!preg_match('/^http/',$value)){
            $finaUrl = config('setting.http_prefix').config('setting.admin_img_prefix').$value;
        }
        return $finaUrl;
    }
}