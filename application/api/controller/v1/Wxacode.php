<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14 0014
 * Time: 下午 15:23
 */

namespace app\api\controller\v1;

use app\api\service\Wxacode as WxacodeService;

class Wxacode
{
    public function getaCode(){
        if(request()->isPost()){
            $data = input('post.');
            $ws = new WxacodeService();
            // 获取参数
            $param = $ws->getParams($data);
            $token = $ws->getToken();
            $img_path = $ws->getaCode($token,$param);
            return $img_path;
        }
    }
}