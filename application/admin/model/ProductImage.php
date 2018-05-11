<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11 0011
 * Time: 下午 19:42
 */

namespace app\admin\model;


use think\Model;

class productImage extends Model
{
    protected $hidden = ['delete_time','create_time','update_time'];
    public function img(){
        return $this->hasMany('Image','id','img_id');
    }
}