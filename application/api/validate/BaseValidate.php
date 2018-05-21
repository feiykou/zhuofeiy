<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2017/12/15 13:47
 *
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck($scene=''){
        //获取http参数并校验
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->scene($scene)->check($params);
        if(!$result){
            throw new ParameterException([
                'msg' => $this->error
            ]);
        }else{
            return true;
        }
    }

    protected function isPositiveInteger($value){
        /*
         * 判断是否是正整数
         */
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            return true;
        }
        return false;
    }

    protected function iszeroInteger($value){
        /*
         * 判断是否是正整数包含0
         */
        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>=0){
            return true;
        }
        return false;
    }

    // 判断值是否为空
    protected function isNotEmpty($value){
        if(!empty($value)){
            return true;
        }
        return false;
    }

    // 通过规则获取数据
    public function getDataByRule($arrays){
        if(array_key_exists('user_id', $arrays) | array_key_exists('uid', $arrays)){
            // 不允许包含user_id或者uid，防止恶意覆盖user_id外键
            throw new ParameterException([
                'msg'  => '参数中包含有非法的参数名user_id或者uid'
            ]);
        }
        $newArr = [];
        foreach ($this->rule as $key=>$value){
            $newArr[$key] = $arrays[$key];
        }
        return $newArr;
    }

    /**
     * 判断是否是手机号
     */
    protected function isMobile($value){
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}