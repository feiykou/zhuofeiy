<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/24
 * Time: 20:09
 */

namespace app\admin\controller;


use app\admin\model\Image;
use org\Auth;
use think\Controller;
use think\Request;

class Common extends Controller
{
    public $account;
    public function _initialize()
    {
        $isLogin = $this->isLogin();
        if(!$isLogin){
            $this->redirect(url('/login'));
        }
        $Username = $this->account->name;
        session('username',$Username,'admin');
        $Uid = $this->account->id;

        // 判断用户名是否是admin，如果是则不进行验证
        if($Username == 'zhuo'){
            return true;
        }

        // 引入权限class
        $auth = new Auth();
        $request = Request::instance();
        // 获取控制器名
        $controll = $request->controller();
        // 获取方法名
        $action = $request->action();
        // 拼接
        $name = $controll.'/'.$action;
        // 排除进行检查的链接
        $notCheck = [
            'Index/main',
            'Index/index',
            'User/logout'
        ];

        if(!in_array($name,$notCheck)){
            if(!$auth->check($name,$Uid)){
                $this->error('没有权限访问',url('/'));
            }
        }
    }

    /* 判断是否登录 */
    public function isLogin(){
        // 获取session
        $user = $this->getLoginUser();
        if($user && $user->id){
            return true;
        }
        return false;
    }

    public function getUserId(){
        // 获取session
        $user = $this->getLoginUser();
        return $user->id;
    }

    /* 获取session数据 */
    public function getLoginUser(){
        if(!$this->account){
            $this->account = session('user','','admin');
        }
        return $this->account;
    }

//    public function getImg(){
//        if($_FILES['file']['tmp_name']){
//            $file = request()->file('file');
//            $info = $file->move('upload');
//            if($info){
//                $img_url = DS . 'upload' . DS . $info->getSaveName();
//            }
//        }
//        if(!empty($img_url)){
//            return $this->result($img_url,'1','上传成功','json');
//        }else{
//            return $this->result('','2','上传失败','json');
//        }
//    }

    public function getSaveNameImg(){
        if($_FILES['file']['tmp_name']){
            $file = request()->file('file');
            // 上传图片并保存原文件名，覆盖相同图片
            $info = $file->move('img','');
//            $info = $file->move('upload',true,false);
            if($info){
//              $img_url = DS . 'img' . DS . $info->getSaveName();
//                $img_url = $info->getSaveName();
                $img_url = DS . $info->getSaveName();
            }
        }
        if(!empty($img_url)){
            $img_id = Image::addImg($img_url);
            $param = [
                "img_id"  => $img_id,
                "img_url" => $img_url
            ];
            $this->result($param,'1','上传成功','json');
        }else{
            $this->result('','2','上传失败','json');
        }
    }


    // 状态
    public function status(){
        // 获取值
        $data = input('param.');

        // 严格检验
        if(empty($data['id'])){
            $this->error('id不合法');
        }
        if(!is_numeric($data['status'])){
            $this->error('status不合法');
        }

        // 获取控制器
        $model = request()->controller();
        $result = model($model)->save([
            'status' => $data['status']
        ],['id'=>$data['id']]);

        // 返回结果
        if($result){
            return json(['type'=>'success','success'=>'更新成功','code'=>0]);
        }else{
            return json(['type'=>'error','error'=>'更新失败','code'=>1]);
        }
    }

    // 排序
    public function order(){
        // 获取值
        $data = input('param.');

        // 严格检验
        if(empty($data['id'])){
            $this->error('id不合法');
        }
        if(!is_numeric($data['order'])){
            $this->error('order不合法');
        }

        // 获取控制器
        $model = request()->controller();
        $result = model($model)->save([
            'order' => $data['order']
        ],['id'=>$data['id']]);

        // 返回结果
        if($result){
            return json(['type'=>'success','success'=>'更新成功','code'=>0]);
        }else{
            return json(['type'=>'error','error'=>'更新失败','code'=>1]);
        }
    }

}