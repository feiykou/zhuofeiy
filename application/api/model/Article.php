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
    protected $hidden = ['delete_time','update_time','category_id','user_id','status','img_id'];


    public function cate(){
        return $this->belongsTo('Cate','category_id','id');
    }

    public function img(){
        return $this->belongsToMany('Image','article_image','img_id','article_id');
    }

    // 自动添加图片链接前缀
    public function getImgUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
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

    public static function getOneArtById($id){
        $data = [
            'id' => $id
        ];

        $result = self::where($data)
            ->with('cate')
            ->find();
        return $result;
    }

}