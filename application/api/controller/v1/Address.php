<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/21 0021
 * Time: 上午 11:35
 */

namespace app\api\controller\v1;


use app\api\model\AppUser;
use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\lib\enum\ScopeEnum;
use app\lib\exception\AppUserException;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;

class Address extends BaseController
{

    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
    ];

    public function createOrUpdateAddress(){
        $validate = new AddressNew();
        $validate->goCheck();
        // 根据Token来获取uid
        $uid = TokenService::getCurrentUid();
        // 根据uid来查找用户数据，判断用户是否存在，如果不存在抛出异常
        $user = AppUser::get($uid);
        if(!$user){
            throw new AppUserException();
        }
        // 获取用户从客户端提交来的地址信息
        $dataArray = $validate->getDataByRule(input('post.'));
        $userAddress = $user->address;
        // 根据用户地址信息是否存在，来判断是更新还是新增
        if(!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
        return json(new SuccessMessage(), 201);
    }
}