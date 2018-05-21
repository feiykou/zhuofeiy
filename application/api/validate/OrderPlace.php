<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 16:26
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{

    protected $product = [
        [
            'product_id'  =>  1,
            'count'       =>  3
        ],
        [
            'product_id'  =>  2,
            'count'       =>  3
        ],
        [
            'product_id'  =>  3,
            'count'       =>  3
        ]
    ];

    protected $rule = [
        'products' => 'checkProducts'
    ];

    /**
     * 怎么才能去验证，需要手动调用验证器方法
     * @var array
     */
    protected $singRule = [
        'product_id'  =>    'require|isPositiveInteger',
        'count'       =>    'require|isPositiveInteger'
    ];

    protected function checkProducts($value){
        if(!is_array($value)){
            throw new ParameterException([
                'msg'  =>  '商品参数不正确'
            ]);
        }
        if(empty($value)){
            throw new ParameterException([
               'msg'  =>  '商品列表不能为空'
            ]);
        }

        // 不要把逻辑直接下载foreach中
        foreach ($value as $value){
            $this->checkProduct($value);
        }
        return true;
    }

    protected function checkProduct($value){
        $validate = new BaseValidate($this->singRule);
        $result = $validate->check($value);
        if(!$result){
            throw new ParameterException([
                'msg'   =>  '商品列表参数错误'
            ]);
        }
    }
}