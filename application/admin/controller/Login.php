<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22
 * Time: 0:26
 */

namespace app\admin\controller;


use think\captcha\Captcha;
use think\Controller;
use app\admin\model\User;

class Login extends Controller
{

    function setCode(){
        $config = [
            'fontSize' =>  20,
            'length'   =>  3,
            'imageW'   =>  130,
            'imageH'   =>  40
        ];
        $capcha = new Captcha($config);
        return $capcha->entry();
    }


    public function index(){
        $sessionUser = session('user','','admin');
        if($sessionUser){
            return $this->redirect('/');
        }
        return $this->fetch();
    }


    // 登录验证
    public function getLogin(){
        if(request()->isPost()){
            $this->check(input('code'));
            $user = new User();
            $result = $user->login(input('post.'));
            if($result === 1){
                $this->error('用户不存在！@',url('/login'));
            }
            if($result === 3){
                $this->error('密码错误！',url('/login'));
            }
            if($result === 2){
                $this->success('登录成功',url('/'),'2');
            }
        }else{
            // 获取session
            $account = session('user','','admin');
            if($account && $account->id){
                return $this->redirect(url('/'));
            }
            return $this->fetch();
        }
    }

    // 检查验证码
    public function check($code=''){
        if(!captcha_check($code)){
            $this->error('验证码错误',url('/login'));
        }else{
            return true;
        }
    }
}