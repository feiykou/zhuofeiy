<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 15:24
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = ['create_time','delete_time','deleted',
                         'update_time','pivot','status','deleted',
                         'reorder','publisher','art_cate_id','from'];

    /**
     * 功能：把main_img_url的相对路径变成绝对路径
     *
     * @param $value main_img_url的值
     * @param $data 获取的查询到的数据
     * @return string  返回的是图片的绝对路径
     */
    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    /**
     * 功能：查询最近产品
     *
     * 按照create_time的升序进行排序
     * @param $count 设置查询数据的条数
     */
    public static function getMostRecent($count){
        $order = [
            'create_time' => 'desc'
        ];

        $products = self::limit($count)
            ->order($order)
            ->select();
        return $products;
    }

    /**
     * 获取分类下的产品
     * @param $cateID
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getProductsBtCateID($cateID){
        $data = [
            'art_cate_id' => $cateID
        ];
        $products = self::where($data)
            ->select();

        return $products;
    }


    public static function getProductDetail($id){

    }


}