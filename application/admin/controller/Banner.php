<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 17:17
 */

namespace app\admin\controller;


class Banner extends Common
{
    private $model;
    public function _initialize()
    {
        parent::_initialize();
        $this->obj = model('banner');
    }

    public function index(){

        return $this->fetch();
    }

    public function add(){
        return $this->fetch();
    }

    public function edit(){
        return $this->fetch();
    }
}