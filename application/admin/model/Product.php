<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/25
 * Time: 16:55
 */

namespace app\admin\model;


use think\Model;

class Product extends Model
{
    protected $hidden = ['create_time','update_time','delete_time'];

    public function imgs(){
        return $this->belongsToMany('Image','product_image','img_id','product_id');
    }

    public function item(){
        return $this->hasMany('productImage','product_id','id');
    }

//    public function cate(){
//        return $this->belongsTo('ArtCate','art_cate_id','id');
//    }
//    public function cate(){
//        return $this->belongsTo('ArtCate')->field('name as pname');
//    }

    public function getProductDetail($id){
        $product = self::with(['item','item.img'])->find($id);
        return $product;
    }

    public function getimgArrByProduct($product){
        $itemArr = $product->item;
        $imgArr = [];
        foreach ($itemArr as $k=>$v){
            foreach ($v->img as $key=> $img_v){
                $imgArr[$key]['url'] = $img_v['url'];
                $imgArr[$key]['id'] = $img_v['id'];
            }
        };
        return $imgArr;
    }

    public function getImgUrlArr($img_url){
        $img_url = trim($img_url,';');
        $img_data = explode(";",$img_url);
        $data = [];
        foreach ($img_data as $k=>$v){
            $data[] = ['url'=>$v];
        }
        return $data;
    }

    /**
     * 添加和更新中间表product_image数据
     * @param $img_url  图片链接
     * @param $pro_id  产品id
     * @param $img_ids 图片集
     * @param bool $mark  true表示更新，false表示添加
     * @return false|int
     * @throws \think\exception\DbException
     */
    public function saveImg($pro_id,$img_ids,$mark=false){
//        $data = $this->getImgUrlArr($img_url);
        $img_id_arr = explode(',',$img_ids);
        $mark && self::get($pro_id)->imgs()->detach($img_id_arr);
        self::get($pro_id)->imgs()->saveAll($img_id_arr);
        $imgModelData = Product::get($pro_id)->imgs;
        $result = self::get($pro_id)->save([
            'main_img_url' => $imgModelData[0]['url'],
            'img_id'       => $imgModelData[0]['id']
        ]);
        return $result;
    }

    public function updateImg($img_url,$pro_id){

        $data = $this->getImgUrlArr($img_url);

        foreach ($data as $key=>$v){
            $update = self::get($pro_id)->imgs()->update($v);
        }
        if($update){
            $imgModelData = Product::get($pro_id)->imgs;
            $result = self::get($pro_id)->update([
                'id' => $pro_id,
                'main_img_url' => $imgModelData[0]['url'],
                'img_id'       => $imgModelData[0]['id']
            ]);
            return $result;
        }
        return $update;
    }

    /**
     * 获取全部的数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllData(){
        $data = [
            'deleted' => 1
        ];

        return $this->where($data)->select();
    }



//    public static function getDataById($id=0){
//        $data = [
//            'id' => $id,
//        ];
//        $getDataById = self::get($id);
//        $getDataById->cate;
//        return $getDataById;
//    }

    public static function updateData($id=0,$proData){
        $data = [
            'id' => $id
        ];
        $result = self::where($data)->update($proData);
        return $result;
    }

    /**
     * 删除某一条数据
     * @param int $id
     * @return int
     */
    public function removeDataById($id=0){
        $data = [
            'id' => $id,
        ];

        $result = $this->where($data)->update(['deleted'=>0]);
        return $result;
    }

    /**
     * 删除多条数据
     */
    public function removeMoreDataById($idArr=[]){

        $data = [
            'id' => ['in',$idArr]
        ];
        $result = $this->where($data)->update(['deleted'=>0]);
        return $result;
    }

    // 判断是否存在同名
    public function is_unique($name="",$id=0){
        $data = [
            'status'    => ['eq',1],
            'id'        => ['neq',$id],
            'name'      => $name
        ];
        $result = $this->where($data)->find();
        return $result;
    }
}