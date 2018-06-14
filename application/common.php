<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Request;

/**
 *  获取请求根部和根目录
 *
 * @return array 返回的是请求根部和根目录
 */
function getRootBaseArr(){
    // 基础替换字符串
    $request = Request::instance();
    $base    = $request->root();
    $root    = strpos($base, '.') ? ltrim(dirname($base), DS) : $base;
    if ('' != $root) {
        $root = '/' . ltrim($root, '/');
    }
    return [
        "root"=>$root,
        "base"=>$base
    ];
}

function sortData($arr,$pid=0,$level=0,$html="----"){
    $newArr = [];
    foreach ($arr as $k=>$v){
        if($v['pid']==$pid){
            $v['level'] = $level;
            $v['html'] = $html;
            $newArr[] = $v;
            $newArr = array_merge($newArr,sortData($arr,$v['id'],$v['level']+1));
        }
    }
    return $newArr;
};



/**
 * 验证手机号是否正确
 * @author honfei
 * @param number $mobile
 */
function isMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
};


/**
 * 检测某key是否存在数组中
 */
function keyInArray($data,$key){
    $_data = [];
    foreach ($data as $k => $v){
        $_data[] = $k;
    }
    if(in_array($key,$_data)){
        return true;
    }else{
        return false;
    }
};


function curl_get($url, &$httpCode = 0){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //不做证书验证，部署在linux环境下请改为true
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}


/**
 * @param string $url post请求地址
 * @param array $params
 * @return mixed
 */
function curl_post($url, array $params = array())
{
    $data_string = json_encode($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json'
        )
    );
    $data = curl_exec($ch);
    curl_close($ch);
    return ($data);
}

function curl_post_img($url, array $params = array())
{
    $ch = curl_init();
    // 请求地址
    curl_setopt($ch, CURLOPT_URL, $url);
    // 请求参数类型
    $param = json_encode($params);
    // 关闭https验证
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    // post提交
    if($param){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
    }
    // 返回的数据是否自动显示
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // 执行并接收响应结果
    $output = curl_exec($ch);
    // 关闭curl
    curl_close($ch);
    return $output !== false ? $output : false;
//    $data_string = json_encode($params);
//    $ch = curl_init();
//    $header = array('Accept-Charset: utf-8');
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $tmpInfo = curl_exec($ch);
//    if (curl_errno($ch)) {
//        return false;
//    }else{
//        return $tmpInfo;
//    }

}

function curl_post_raw($url, $rawData)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER,
        array(
            'Content-Type: text'
        )
    );
    $data = curl_exec($ch);
    curl_close($ch);
    return ($data);
}

function getRandChar($length){
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol) - 1;
    for ($i = 0;
         $i < $length;
         $i++) {
        $str .= $strPol[rand(0, $max)];
    }
    return $str;
}
















