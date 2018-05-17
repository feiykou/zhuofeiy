<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 15:23
 */

namespace app\api\model;


class Theme extends BaseModel
{

    protected $hidden = ['topic_img_id','delete_time','head_img_id','update_time'];

    public function topicImg(){
        return $this->belongsTo('Image','topic_img_id','id');
    }

    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }

    public function products(){
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

    public static function getThemeWithProducts($id){
        $themes = self::with('products,topicImg,headImg')
            ->find($id);
        return $themes;
    }
}