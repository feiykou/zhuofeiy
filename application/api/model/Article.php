<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 23:49
 */

namespace app\api\model;


class Article extends BaseModel
{
    protected $hidden = ['delete_time','update_time','create_time','category_id','user_id','status','img_id'];
    protected $autoWriteTimestamp = true;
    protected $dateFormat = 'Y-m-d H:i:s';

    public function cate(){
        return $this->belongsTo('Cate','category_id','id');
    }

    public function img(){
        return $this->belongsToMany('Image','article_image','img_id','article_id');
    }

    public static function getAllArticle(){
        $order = [
            'id' => 'desc'
        ];
        $data = [
            'status' => 1
        ];
        $result = self::where($data)
            ->with(['cate','img'])
            ->order($order)
            ->paginate(10,true);
        return $result;
    }

}