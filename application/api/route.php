<?php
/**
 * Created by PhpStorm.
 * User: feiy
 * Date: 2018/5/14 0014
 * Time: 下午 14:42
 */
use think\Route;

// banner轮播图
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

// 获取多个主题，参数是ids
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');

// 获取主题中其中一个主题，参数是id
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

// 获取最新产品
Route::get('api/:version/product/recent','api/:version.Product/getRecent');

//提供分类id，获取对应的所有产品
Route::get('api/:version/product/by_cate','api/:version.Product/getAllInCate');
Route::get('api/:version/product/:id','api/:version.Product/getOne');


// 获取分类的全部数据
Route::get('api/:version/cate/all','api/:version.Cate/getAllCategories');

// 获取用户token
Route::post('api/:version/token/user','api/:version.Token/getToken');

// Address创建和查询
Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');

// order
Route::post('api/:version/order','api/:version.Order/placeOrder');
Route::get('api/:version/order/:id','api/:version.Order/getDetail',[],['id'=>'\d+']);
Route::get('api/:version/order/by_user','api/:version.Order/getSummaryByUser');

// pay
Route::post('api/:version/pay/pre_order','api/:version.Pay/getPreOrder');
// 给微信定义的回调API
Route::post('api/:version/pay/notify','api/:version.Pay/receiveNotify');
