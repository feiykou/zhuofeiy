<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/24
 * Time: 20:09
 */

namespace app\admin\controller;


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
            $this->error('您尚未登录系统',url('/login'));
        }
        $Username = $this->account->name;
        session('username',$Username,'admin');
        $Uid = $this->account->id;

        // 判断用户名是否是admin，如果是则不进行验证
        if($Username == 'admin'){
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

    /* 获取session数据 */
    public function getLoginUser(){
        if(!$this->account){
            $this->account = session('user','','admin');
        }
        return $this->account;
    }
}