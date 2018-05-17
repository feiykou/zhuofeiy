<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14 0014
 * Time: 下午 14:38
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;
use think\Controller;
use app\api\model\Banner as BannerModel;

class Banner extends Controller
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @param $id  多个banner指定的id号
     */
    public function getBanner($id){
        (new IDMustBePostiveInt())->goCheck();
        // 获取banner数据
        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            throw new BannerMissException();
        }
        return json($banner);
    }
}