<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14 0014
 * Time: 下午 15:25
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use think\Exception;

class Wxacode
{

    protected $wxAppID;
    protected $wxAppSecret;
    protected $token_url;


    function __construct()
    {
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->token_url = sprintf(config('wx.token_url'),$this->wxAppID,$this->wxAppSecret);
    }

    public function getToken(){
        $result = curl_get($this->token_url);
        $tokenJson = json_decode($result, true);
        if(empty($tokenJson)){
            throw new Exception('获取session_key及openID时异常，微信内部错误');
        }
        else{
            if(array_key_exists('errcode',$tokenJson)){
                $this->processLoginError($tokenJson);
            }else{
                $token = $tokenJson['access_token'];
            }
        }
        return $token;
    }

    public function getaCode($token, $param=[]){
        $codeParam = [
            'scene' => '1254asdas',
            'width' => 420,
            'is_hyaline' => true,
            'path' => 'pages/home/home'
        ];
        $codeParam = array_merge($codeParam, $param);
        $aCodeUrl = sprintf(config('wx.aCode_url'),$token);

        // 获取小程序码
        $result = curl_post_img($aCodeUrl, $codeParam);
        $imgJson = json_decode($result, true);

        if(is_array($imgJson) && array_key_exists('errcode',$imgJson)){
            $this->processLoginError($imgJson);
        }else{
            // 生成二维码并返回图片路径
            $img_path = $this->getAcodeImg($result);
            return $img_path;
        }
    }

    /**
     * 生成二维码并返回图片路径
     * @param $acodeImg
     */
    private function getAcodeImg($acodeImg){
        $date_folders = date('Ymd',time());
        $savePath =  "acodeImg/".$date_folders.'/';// 设置附件上传目录

        // 判断是否存在目录，否则创建
        if (!is_dir($savePath)){
            @mkdir('./'.$savePath, 0777,true);
        }
        // 图片命名
        $file_name = time()."_".mt_rand().".png";
        // 图片相对路径
        $img_path = $savePath.$file_name;
        // 生成图片
        file_put_contents($img_path,$acodeImg);

        return config('setting.http_prefix').$img_path;
    }


    public function getParams($data=[]){
        $param = [];
        $keyArr = ['path','width','auto_color','line_color','is_hyaline'];

        foreach ($keyArr as $value){
            if(array_key_exists($value,$data)){
                $param[$value] = $data[$value];
            }
        };

        return $param;
    }

    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg'         =>    $wxResult['errmsg'],
            'errorCode'   =>    $wxResult['errcode']
        ]);
    }
}