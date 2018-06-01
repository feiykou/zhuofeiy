<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 13:47
 */

namespace app\api\model;


use think\Model;

class BannerItem extends Model
{
    protected $hidden = ['delete_time','update_time','id','img_id','banner_id','create_time'];
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }

    /**
     * 返回指定id的banner信息
     * @relativeModel BannerItem，image
     * @param $id
     */
    public static function getBannerByID($banner_id){
        $banner = self::with(['img'])
            ->where('banner_id','=',$banner_id)
            ->select();
        return $banner;
    }
}