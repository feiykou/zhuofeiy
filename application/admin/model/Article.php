<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/1/31 15:08
 *
 */

namespace app\admin\model;


use think\Model;
use think\model\Merge;

class Article extends Model
{
    public function getimg(){
        return $this->hasMany('','');
    }
    /**
     * 删除某一条数据
     * @param int $id
     * @return int
     */
    public function removeDataById($id=0){
        $data = [
            'id' => $id,
            'status' => 1
        ];

        $result = $this->where($data)->update(['status'=>0]);
        return $result;
    }

    /**
     * 删除多条数据
     */
    public function removeMoreDataById($idArr=[]){

        $data = [
            'id' => ['in',$idArr],
        ];
        $result = $this->where($data)->update(['status'=>0]);
        return $result;
    }

    /**
     * 获取某条数据
     * @param int $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getDataById($id=0){
        $data = [
            'id' => $id,
            'status' => 1
        ];

        $result = $this->where($data)->find();
        return $result;
    }


    public function getAllCateData(){
        $cateData = Cate::alias('a1')
            ->field('a1.*,a2.name as pname')
            ->join('cate a2','a1.pid=a2.id','left')
            ->select();
        $sortArr = sortData($cateData);
        return $sortArr;
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