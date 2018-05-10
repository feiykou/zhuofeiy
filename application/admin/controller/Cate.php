<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/1/31 15:19
 *
 */

namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
use app\admin\validate\CateValidate;
use app\admin\validate\ZeroValidate;

class Cate extends Common
{
    private $model;
    public function _initialize()
    {
        parent::_initialize();
        $this->obj = model('cate');
    }

    public function index(){
        $cateData = CateModel::alias('a1')
            ->field('a1.*,a2.name as pname')
            ->join('cate a2','a1.pid=a2.id','left')
            ->paginate();
        $page = $cateData->render();
        $sortArr = sortData($cateData);
        return $this->fetch('',[
            'page' => $page,
            'cateArr' => $sortArr
        ]);
    }


    // 添加分类
    function add(){
        // 判断请求类型
        if(request()->isPost()){
            (new CateValidate())->goCheck();
            $cateData = input("post.",'','htmlentities');
            // 判断是否存在同名类
            $name = $cateData['name'];
            $exists = CateModel::where('name','=',$name)->find();
            if($exists){
                return json(['type'=>'err_exist','err_exist'=>"存在同名分类！","code"=>1]);
            }
            $rsCate = CateModel::insert($cateData);
            if($rsCate){
                return json(['type'=>'success','success'=>'添加成功','code'=>0]);
            }else{
                return json(['type'=>'error','error'=>'添加失败',"code"=>1]);
            }
        }else{
            $cateData = $this->obj->getNormalFirstCate();
            $sortArr = sortData($cateData);
            return $this->fetch('',[
                'cateArr' => $sortArr
            ]);
        }
    }
    // 编辑分类
    function edit($id=0){
        $cateIdData = CateModel::where('id','=',$id)->find();
        $cateData = CateModel::alias('a1')
            ->field('a1.*,a2.name as pname')
            ->join('cate a2','a1.pid=a2.id','left')
            ->select();

        $parentData = CateModel::getDeptData($id);
        $this->assign('cateArr',$parentData);
        if($cateIdData){
            $this->assign('cateData',$cateIdData);
            return $this->fetch();
        }else{
            return $this->error('获取分类数据错误');
        }
    }
    // 处理编辑分类
    function handleEdit($id=''){
        if(request()->isPost()){
            (new CateValidate())->goCheck();
            $cateData = request()->post();
            // 判断是否存在同名类
            $name = $cateData['name'];
            $exists = CateModel::where(['name'=>$name,'id'=>['neq',$id]])->find();
            if($exists){
                return json(['type'=>'err_exist','err_exist'=>"存在同名分类！","code"=>1]);
            }

            $rsCate = CateModel::where('id','=',$id)->update($cateData);
            if($rsCate){
                return json(['type'=>'success','success'=>'添加成功','code'=>0]);
            }else{
                return json(['type'=>'error','error'=>'更新失败',"code"=>1]);
            }
        }
    }

    // 删除分类
    function cateDel($id=""){
        (new ZeroValidate())->goCheck();
        // 锁
        $mark = true;
        // 判断是否存在子类
        $curCate = CateModel::all();
        $son = sortData($curCate,$id);
        if(!empty($son)){
            $mark = false;
        }
        if(!$mark){
            return json(['type'=>'exits','exits'=>'存在子类','code'=>2]);
        }else{
            $result = CateModel::where('id','=',$id)->delete();
            if($result){
                return json(['type'=>'success','success'=>'删除成功','code'=>0]);
            }else{
                return json(['type'=>'success','success'=>'删除失败','code'=>1]);
            }
        }
    }

}