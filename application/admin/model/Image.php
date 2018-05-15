<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/2/23 11:33
 *
 */

namespace app\admin\model;


use think\Model;

class Image extends Model
{
    protected $hidden = ['delete_time','create_time','update_time'];

    public function getUrlAttr($value){
        $finaUrl = $value;
        if(!preg_match('/^http/',$value)){
            $finaUrl = config('setting.http_prefix').config('setting.admin_img_prefix').$value;
        }
        return $finaUrl;
    }

    public static function addImg($url=""){
        $imgId = self::where('url','=',$url)->value('id');
        if(!$imgId){
            $img = new self();
            $img->url = $url;
            $img->save();
            $imgId = $img->id;
        }
        return $imgId;
    }
}