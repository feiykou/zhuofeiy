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
}