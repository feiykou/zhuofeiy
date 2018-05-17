<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/17 0017
 * Time: 上午 10:58
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count=15){
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);

        if($products->isEmpty()){
            throw new ProductException();
        }

        // 临时隐藏summary字段
        $products = $products->hidden(['summary']);

        return $products;
    }


    public function getAllInCate($id){
        (new IDMustBePostiveInt())->goCheck();
        $products = ProductModel::getProductsBtCateID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        // 临时隐藏summary字段
        $products = $products->hidden(['summary']);
        return $products;
    }
}