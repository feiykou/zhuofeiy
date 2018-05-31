<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 14:26
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value, $data){
        $finaUrl = $value;
        if(!preg_match('/^http/',$value)){
            $finaUrl = config('setting.http_prefix').config('setting.api_img_prefix').$value;
        }
        return $finaUrl;
    }
}