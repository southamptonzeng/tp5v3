<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model
{
    //软删除
    use SoftDelete;

    //登录校验
    public function login($data) {

        //做一个判断，看看是否为空
        $validate = new \app\common\validate\Admin();
        if (!$validate->scene('login')->check($data)) {
            return $validate->getError();
        }

        //在数据中查询由没有这个用户信息
        $result = $this->where($data)->find();
        if ($result) {
            //判断用户是否可用
            if ($result['status'] == 0) {
                return "此账户被禁用!";
            }
            //1表示有这个用户，也就时用户名和密码正确
            //存储用户的session
            $sessionData = ['id' => $result['id'],
                'nickname' => $result['nickname'],
                'is_super' => $result['is_super']
            ];
            session('admin', $sessionData);
            return 1;
        } else {
            return '用户名或者密码错误!';
        }
    }

    //注册账户
    public function register($data) {
        $validate = new \app\common\validate\Admin();
        if (!$validate->scene('register')->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result == false) {
            return '注册失败';
        } else {
            mailto($data['email'], '注册管理员账户成功', '请开启你的博客人生!');
            return 1;
        }
    }

    //测试插入数据
    public function test($data) {
        $result = $this->allowField(true)->save($data);
        if ($result ==false) {
            return '插入失败';
        } else {
            return 1;
        }
    }

    //重置密码
    public function reset($data) {
        $validate = new \app\common\validate\Admin();
        if (!$validate->scene('reset')->check($data)) {
            return $validate->getError();
        }
        if ($data['code'] != session('code')) {
            return '验证码不正确!';
        }
        $adminInfo = $this->where('email', $data['email'])->find();
        $password = mt_rand(100000, 999999);
        $adminInfo->password = $password;
        $result = $adminInfo->save();
        if ($result) {
            $content = '恭喜您, 密码重置成功. 新密码是:'.$password;
            mailto($data['email'], '密码重置成功',$content);
            return 1;
        } else {
            return '重置密码失败!';
        }
    }
}