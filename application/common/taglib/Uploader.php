<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/30 0030
 * Time: 下午 17:37
 */

namespace app\common\taglib;


use think\template\TagLib;

class Uploader extends TagLib
{
    protected $tags = [
        'webuploadercss' => ['attr' => '', 'close' => 0],
        'webuploaderjs'  => ['attr' => '', 'close' => 0],
        'webuploader'     => ['attr' => 'btnVal', 'close' => 0],
    ];

    public function tagWebuploadercss($tag, $content){
        $parseStr = '<link href="__RES_ADMIN__/css/webuploader.css" rel="stylesheet">';
        return $parseStr;
    }



    public function tagWebuploaderjs($tag, $content){
        $parseStr = '<script type="text/javascript" src="__RES_ADMIN__/js/webuploader.js"></script>';
        $parseStr .= '<script type="text/javascript" src="__RES_ADMIN__/js/uploadNew.js"></script>';
        return $parseStr;
    }

    public function tagWebuploader($tag){
        $btnVal = isset($tag['btnVal'])?$tag['btnVal']:'开始上传';
        $parseStr = <<<php
            <div id="uploader">
                <div class="uploader_btns">
                    <div id="filePicker"></div><div class="uploadBtn">$btnVal</div>
                </div>
                <!--用来存放item-->
                <div class="queueList"></div>
            </div>
php;

        return $parseStr;
    }
}