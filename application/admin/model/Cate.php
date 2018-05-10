<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/1/31 15:12
 *
 */

namespace app\admin\model;


use app\lib\exception\CateException;
use think\Model;

class Cate extends Model
{
    protected $hidden = ['create_time','update_time','delete_time'];

    public function cate(){
        return $this->hasOne('cate')->field('name');
    }

    public static function getDeptData($id){
        $model = new self();
        $ModelDatas = $model->select();
        $ids = "";
        $sonDatas = sortData($ModelDatas,$id);
        foreach ($sonDatas as $key=>$value){
            $ids.= $value['id'].',';
        }
        $ids .= trim($id);

        // 排除id字符串的两种方式
        $parentDept = $model->where(["id"=>['not in',$ids]])->select();
        if(!$parentDept){
            throw new CateException();
        }else{
            // 对部门进行重新排序
            $parentSortDept = sortData($parentDept);
        }
        return $parentSortDept;
    }

    // 获取全部分类 ，分页
    public function getAllData(){

        $order = [
            'id' => 'desc'
        ];

        return db('cate')->where($data)
            ->order($order)
            ->paginate();

    }

    // 获取全部分类  排除自身id
    public function getNormalFirstCate($id=0){
        $data = [
            'id'        => ['neq',$id]
        ];

        $order = [
            'id' => 'desc'
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }
}