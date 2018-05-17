<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 下午 14:40
 */

namespace app\api\controller\v1;

use app\api\model\Cate as CateModel;
use app\lib\exception\CateException;

class Cate
{
    public function getAllCategories(){
        $cates = CateModel::getCateAllData();

        if($cates->isEmpty()){
            throw new CateException();
        }
        return $cates;
    }
}