<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2017/12/11 14:25
 *
 */

/**
 * 状态
 */
function status($status){
    if($status == 1){
        $str = '<span class="btn btn-success btn-xs">正常</span>';
    }else if($status == -1){
        $str = '<span class="btn btn-danger btn-xs">待审</span>';
    }else{
        $str = '<span class="btn btn-danger btn-xs">已删除</span>';
    }
    return $str;
}
