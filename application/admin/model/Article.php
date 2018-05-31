<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/1/31 15:08
 *
 */

namespace app\admin\model;


use think\Model;

class Article extends BaseModel
{
    // 文章图片拼接成绝对路径
    public function getImgUrlAttr($value){
        return $this->prefixImgUrl($value);
    }
    // 关联一对多
    public function art_img(){
        return $this->hasMany('ArticleImage','article_id','id');
    }
    // 添加图片
    public function addArticleData($data){
        $artModel = self::create($data);
        if($artModel){
            $result = self::saveImg($artModel);
        }else{
            $result = false;
        }
        return $result;
    }
    // 更新图片
    public function updateArtData($data){
        $id = intval($data['id']);
        $img_ids = self::where('id','=',$id)->value('img_id');
        $artModel = self::update($data,['id' => $id]);
        if($artModel){
            $result = self::saveImg($artModel,$img_ids);
        }
        return $result;
    }

    // 保存图片
    private static function saveImg($currentModel,$img_ids=''){
        $cur_img_id = $currentModel->img_id;
        if(!empty($img_ids)){
            if($cur_img_id == $img_ids){
                return true;
            }else{
                $currentModel->art_img()->delete();
            }
        }

        $img_id_arr = explode(',',$cur_img_id);
        $img_arr = [];
        foreach ($img_id_arr as $value){
            $img_arr[]['img_id'] = $value;
        }
        $result = $currentModel->art_img()->saveAll($img_arr);
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