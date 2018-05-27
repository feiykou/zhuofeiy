<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 17:17
 */

namespace app\admin\model;


use think\Model;

class Banner extends Model
{
    public function banner_item(){
        return $this->hasMany('BannerItem','banner_id','id');
    }
}