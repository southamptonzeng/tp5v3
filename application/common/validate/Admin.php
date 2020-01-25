<?php

namespace app\common\validate;
use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username|管理账户' => 'require',
        'password|密码' => 'require',
        'conpass|确认密码' => 'require|confirm:password',
        'nickname|昵称' => 'require',
        'email|邮箱' => 'require|email'
    ];


    //登录验证场景
    public function sceneLogin() {
        return $this->only(['username', 'password']);
    }
    //注册场景验证
    //only代表只验证写了的参数
    public function sceneRegister() {
        return $this->only(['username', 'password', 'conpass', 'nickname', 'email'])
            ->append('username', 'unique:admin');
    }
}