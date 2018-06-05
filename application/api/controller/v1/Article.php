<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 23:48
 */

namespace app\api\controller\v1;

use app\api\model\Article as ArticleModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ArticleException;

class Article
{
    public function getArticle(){
        $artData = ArticleModel::getAllArticle();
        $artData->each(function($data){
            $attr_index = $data['attribute'];
            $data['attribute'] = config('attributes.article_attr')[$attr_index];
        });
        if(!$artData){
            throw new ArticleException();
        }
        return json($artData);
    }

    public function getArticleById($id){
        (new IDMustBePostiveInt())->goCheck();
        $artData = ArticleModel::getOneArtById($id);
        if(!$artData){
            throw new ArticleException();
        }
        return json($artData);
    }
}