<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/2/23 11:33
 *
 */

namespace app\admin\model;


use think\Model;

class Image extends Model
{
    protected $hidden = ['create_time','update_time','delete_time'];
}