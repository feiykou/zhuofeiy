<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 13:47
 */

namespace app\api\model;


use think\Model;

class Banner extends Model
{

    protected $hidden = ['delete_time','update_time'];
    public function item(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    /**
     * 返回指定id的banner信息
     * @relativeModel BannerItem，image
     * @param $id
     */
    public static function getBannerByID($id){
        $banner = self::with(['item', 'item.img'])
            ->find($id);
        return $banner;
    }
}