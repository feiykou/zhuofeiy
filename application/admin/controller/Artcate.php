<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/1/31 15:19
 *
 */

namespace app\admin\controller;

class Artcate extends Common
{
    function cate(){
        $cateData = ArtCate::all();
        $sortArr = sortData($cateData);
        return $this->fetch();
    }
}