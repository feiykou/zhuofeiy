<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29 0029
 * Time: 上午 10:18
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\model\Webuploader as uploaderModel;

class Webuploader extends Controller
{
    public function img(){
        return $this->fetch();
    }

    public function imgNew(){
        return $this->fetch();
    }

    public function imgBtn(){
        return $this->fetch();
    }

    public function imgBtn2(){
        return $this->fetch();
    }

    public function getImg(){
        if($_FILES['file']['tmp_name']){
            $file = request()->file('file');
            $info = $file->move('upImg');
            if($info){
                $img_url = DS . 'upImg' . DS . $info->getSaveName();
            }
        }
        if(!empty($img_url)){
            return $this->result($img_url,'1','上传成功','json');
        }else{
            return $this->result('','2','上传失败','json');
        }
    }

    public function getImgSrc(){
        $imgArr[] = $this->imgArr;
        return $imgArr;
    }

}