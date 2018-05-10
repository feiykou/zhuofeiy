<?php
/**
 * @desc:
 * @author：feiy
 * @Date: 2018/3/9 11:13
 *
 */

namespace app\admin\model;


use think\captcha\Captcha;
use think\Model;

class User extends Model
{
    // 支持给字段设置类型自动转换，会在写入和读取的时候自动进行类型转换处理
    protected $type = [
        'last_login_time' => 'datetime'
    ];

    // 用户登陆逻辑
    public function login($data){
        $user = $this->where('name','eq',$data['name'])
            ->find();
        if($user){
            if($user['passwords'] == md5($data['passwords'])){
                session('user',$user,'admin');
                $this->update([
                    "id" => $user['id'],
                    "last_login_time" => time()
                ]);
                return 2; // 登录成功的状态
            }else{
                return 3; // 登录密码错误
            }
        }else{
            return 1; // 用户名不存在的情况
        }
    }

    /**
     * 获取角色
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getRoleAllData()
    {
        $data = [
            'status' => 1
        ];
        $result = db('auth_group')->where($data)->select();
        return $result;
    }

    /**
     * 获取全部数据
     */
    public function getAllData(){
        $data = [
            'status' => 1,
        ];
        $result = $this->where($data)->select();
        return $result;
    }

    /**
     * 删除某一条数据
     * @param int $id
     * @return int
     */
    public function removeDataById($id=0){
        $data = [
            'id' => $id,
            'status' => 1
        ];

        $result = $this->where($data)->update(['status'=>0]);
        return $result;
    }

    /**
     * 获取某条数据
     * @param int $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getDataById($id=0){
        $data = [
            'id' => $id,
            'status' => 1
        ];

        $result = $this->where($data)->find();
        return $result;
    }

    /**
     * 更新某条数据
     * @param int $id
     * @param array $update_data
     * @return $this
     */
    public function updateDataById($id=0,$update_data=[]){
        $data = [
            'id' => $id,
            'status' => 1
        ];

        $result = $this->where($data)->update($update_data);
        return $result;
    }
    /**
     * 用户和角色多对多关联
     * belongsToMany参数：
     *      AuthGroup：关联表模型
     *      auth_group_access：中间表
     *      group_id和uid：中间表字段
     * @return \think\model\relation\BelongsToMany
     */
    public function group(){
        return $this->belongsToMany('AuthGroup','auth_group_access','group_id','uid');
    }


    public static function getUserWithRole($id){
        $user = self::with('group')
            ->find($id);
        return $user;
    }
}