<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 15:38
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => "require|checkIDs",
    ];

    protected $message = [
        'ids' => 'id必须是以逗号分隔的正整数'
    ];

    protected function checkIDs($value){
        $values = explode(',', $value);
        if(empty($values)){
            return false;
        }
        foreach ($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}