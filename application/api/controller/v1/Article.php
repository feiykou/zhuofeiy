<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 23:48
 */

namespace app\api\controller\v1;

use app\api\model\Article as ArticleModel;
use app\lib\exception\ArticleException;

class Article
{
    public function getArticle(){
        $artData = ArticleModel::getAllArticle();
        if(!$artData){
            throw new ArticleException();
        }
        return json($artData);
    }
}