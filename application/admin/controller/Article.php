<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/1/30 17:45
 *
 */

namespace app\admin\controller;



use app\admin\model\Cate;
use app\admin\model\Image;
use app\admin\validate\ArticleValidate;
use app\admin\validate\CateValidate;
use app\admin\validate\ZeroValidate;
use app\admin\model\Article as ArticleModel;


class Article extends Common
{

    private $model;
    public function _initialize()
    {
       parent::_initialize();
       $this->model = model('article');
    }

    /**
     * 文章列表
     * @return mixed
     */
    function index(){
        $artData = ArticleModel::alias('a1')
            ->where("status",'=','1')
            ->field('a1.*,a2.name as pname')
            ->order(['id'=>"desc"])
            ->join('cate a2','a1.category_id=a2.id','left')
            ->paginate(10);
        $page = $artData->render();
        $this->assign('artData',$artData);
        return $this->fetch('',['page'=>$page]);
    }

    /**
     * 文章编写
     */
    function add(){
        $cateData = Cate::all();
        $sortArr = sortData($cateData);
        $this->assign('cateArr',$sortArr);
        return $this->fetch();
    }

    /**
     * 文章删除
     */
    function removeArt($id){
        $result = model("article")->removeDataById($id);
        if($result){
            return json(['type'=>'success','success'=>"删除成功！","code"=>0]);
        }else{
            return json(['type'=>'success','error'=>"删除失败！","code"=>0]);
        }
    }

    /**
     * 删除多条文章
     */
    function removeMoreArt(){
        $idArr = input('post.')['idsArr'];
        $result = $this->model->removeMoreDataById($idArr);
        if($result){
            return json(['type'=>'success','success'=>"删除成功！","code"=>0]);
        }else{
            return json(['type'=>'success','error'=>"删除失败！","code"=>0]);
        }
    }

    /**
     * 文章编辑
     */

    function edit($id){
        $getData = $this->model->getDataById($id);
        $cateData = $this->model->getAllCateData();

        $imgUrlArr = model('image')->where(['id'=>['in',$getData['img_id']]])->select();
        return $this->fetch('',[
            'artData'=>$getData,
            'cateArr'=>$cateData,
            'imgUrlArr' => $imgUrlArr
        ]);
    }


    public function save(){
        if(!request()->post()){
            $this->error("请求失败");
        }
        $validate = (new ArticleValidate())->goCheck('add');
        if(!$validate){
            return json(['type'=>'error','error'=>'参数验证失败','code'=>1]);
        }
        // 获取请求数据
        $data = input('post.');
        $proData = [
            'name'          =>      $data['name'],
            'category_id'   =>      $data['category_id'],
            'img_url'       =>      empty($data['img_url'])?'':$data['img_url'],
            'content'       =>      empty($data['content'])?'':$data['content'],
            'click_num'     =>      $data['click_num'],
            'img_id'        =>      $data['img_id'],
        ];
        $is_exist_id = empty($data['id']);

        //判断是否存在同名
        $is_unique = $this->model->is_unique($data['name'],$is_exist_id?0:$data['id']);

        if($is_unique){
            return json(['type'=>'exits','exits'=>'存在同名类','code'=>1]);
        }

        // 更新数据
        if(!$is_exist_id){
            $proData['id'] = $data['id'];
            return $update = $this->update($proData);
        }

        $result = $this->model->save($proData);
        if($result){
            return json(['type'=>'success','success'=>'添加成功','code'=>0]);
        }else{
            return json(['type'=>'error','error'=>'添加失败','code'=>1]);
        }
    }

    // 更新
    public function update($data){
        $result = $this->model->save($data,['id' => intval($data['id'])]);
        if($result){
            return json(['type'=>'success','success'=>'更新成功','code'=>0]);
        }else{
            return json(['type'=>'error','error'=>'更新失败','code'=>1]);
        }
    }









}