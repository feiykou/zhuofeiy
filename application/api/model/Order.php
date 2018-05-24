<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23 0023
 * Time: 下午 14:21
 */

namespace app\api\model;



class Order extends BaseModel
{
    protected $hidden = ['user_id','delete_time','update_time'];

    protected $autoWriteTimestamp = true;

    // 读取器
    public function getSnapItemsAttr($value){
        if(empty($value)){
            return null;
        }
        return json_decode($value);
    }

    public function getSnapAddressAttr($value){
        if(empty($value)){
            return null;
        }
        return json_decode($value);
    }

    // 查询历史订单
    public static function getSummaryByUser($uid, $page=1, $size=15){
        $order = [
            'create_time' => 'desc'
        ];
        $pagingData = self::where('user_id','=',$uid)
            ->order($order)
            ->paginate($size,true,['page'=>$page]);
        return $pagingData;
    }
}