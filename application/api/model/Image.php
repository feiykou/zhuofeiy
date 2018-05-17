<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 13:47
 */

namespace app\api\model;


use think\Model;

class Image extends BaseModel
{
    protected $hidden = ['delete_time','update_time','id','from'];

    // 自动添加图片链接前缀
    public function getUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }
}