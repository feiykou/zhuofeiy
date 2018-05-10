<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/1/30 17:45
 *
 */

namespace app\admin\controller;



use app\admin\model\Cate;
use app\admin\validate\ArticleValidate;
use app\admin\validate\CateValidate;
use app\admin\validate\ZeroValidate;
use app\admin\model\Article as ArticleModel;


class Article extends Common
{

    private $obj;
    public function _initialize()
    {
       parent::_initialize();
       $this->obj = model('article');
    }

    /**
     * 文章列表
     * @return mixed
     */
    function artlist(){
        $artData = ArticleModel::alias('a1')
            ->where("state",'=','1')
            ->field('a1.*,a2.name as pname')
            ->order(['id'=>"desc"])
            ->join('art_cate a2','a1.category_id=a2.id','left')
            ->paginate();
        $page = $artData->render();
        $this->assign('artData',$artData);
        return $this->fetch('',['page'=>$page]);
    }

    /**
     * 文章编写
     */
    function artcon(){
        $cateData = Cate::all();
        $sortArr = sortData($cateData);
        $this->assign('cateArr',$sortArr);
        return $this->fetch();
    }


    /**
     * 文章添加
     */
    function artAdd(){
        if(request()->isPost()){
            (new ArticleValidate())->goCheck();
            $data = input('post.','','htmlentities');
            $result = $this->obj->save($data);
            if($result){
                return $this->success('添加成功',url('/artlist'));
            }else{
                return $this->error('添加失败');
            }
        }
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
        $result = $this->obj->removeMoreDataById($idArr);
        if($result){
            return json(['type'=>'success','success'=>"删除成功！","code"=>0]);
        }else{
            return json(['type'=>'success','error'=>"删除失败！","code"=>0]);
        }
    }

    /**
     * 文章编辑
     */

    function artEdit($id){
        $getData = $this->obj->getDataById($id);
        if($getData['img_url']){
         $getData['img_url'] = config('setting.img_prefix').$getData['img_url'];
        }
        $cateData = $this->obj->getAllCateData();
        return $this->fetch('',[
            'artData'=>$getData,
            'cateArr'=>$cateData
        ]);
    }

    function artEditUpdate($id=0){
        $artconData = input('post.');
        $result = model('article')->save($artconData,['id' => $id]);
        if($result){
            return $this->success("更新成功",'/artlist');
        }else{
            return $this->error('暂无更新');
        }

    }









}