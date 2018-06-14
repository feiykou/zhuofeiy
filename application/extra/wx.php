<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/18 0018
 * Time: 上午 9:53
 */

return [
//    'app_id'         =>     'wx6a68dc8c833c698c',
//    'app_secret'     =>     'c88311e69f67f926d046989cad89dd2b',
//    'app_id'         =>     'wxe44360fb92b221c8',
//    'app_secret'     =>     '3ea510834b012b3ecd576ddb052ee7b4',
    'app_id'         =>     'wx3dc4bc6686bf0027',
    'app_secret'     =>     '1f181f01af8e30068c202726444650ea',
    'login_url'      =>     'https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code',
    'token_url'      =>     'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s',
    'aCode_url'          =>     'https://api.weixin.qq.com/wxa/getwxacode?access_token=%s'
];