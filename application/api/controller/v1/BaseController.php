<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 下午 15:43
 */

namespace app\api\controller\v1;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{
    /**
     * 检查用户是否有权限操作，用户和cms都可以访问
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     * @throws \think\Exception
     */
    protected function checkPrimaryScope(){
        TokenService::needPrimaryScope();
    }

    // 只有用户可以访问
    protected function checkExclusiveScope(){
        TokenService::needExclusiveScope();
    }
}