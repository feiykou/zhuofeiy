<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 下午 14:41
 */

namespace app\api\model;


class Cate extends BaseModel
{
    protected $hidden = ['create_time','update_time','delete_time'];

    public static function getCateAllData(){
        $cates = self::all(function($query){
            $query->where([
                'pid' => 0,
            ])->order([
                'id' => 'desc'
            ]);
        });
        return $cates;
    }
}