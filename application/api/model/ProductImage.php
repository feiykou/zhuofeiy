<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/4 0004
 * Time: 下午 14:13
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = [
        'delete_time','create_time','update_time','img_id','product_id'
    ];

    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }

}