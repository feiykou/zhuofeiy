<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15 0015
 * Time: 下午 15:24
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    /**
     *
     * @url /theme?ids=id1,id2,id3...
     * @return 一组theme模型
     */
    public function getSimpleList($ids=""){
        (new IDCollection())->goCheck();
        $idArr = explode(',',$ids);
        $result = ThemeModel::with('topicImg,headImg')
            ->select($idArr);
        if(!$result){
            throw new ThemeException();
        }
        return $result;
    }


    public function getComplexOne($id){
        (new IDMustBePostiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if(!$theme){
            throw new ThemeException();
        }
        return $theme;
    }
}