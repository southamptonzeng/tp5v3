<?php

namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    //后台登录
    public function login() {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
            ];
            $result = model('Admin')->login($data);
            if ($result == 1) {
                $this->success('登录成功!', 'admin/index/login');
            } else {
                $this->error($result);
            }
        }
        return view();
    }
    //注册
    public function register() {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'conpass' => input('post.conpass'),
                'nickname' => input('post.nickname'),
                'email' => input('post.email')
            ];

            $result = model('Admin')->register($data);
            if ($result == 1) {
                $this->success('注册成功!', 'admin/index/login');
            } else {
                $this->error($result);
            }
        }
        return view();
    }

    //测试数据库的插入操作
    public function test() {
        $data = ['username' => 'a', 'password' => '123', 'conpass' => '123',
            'nickname' => 'xiaobai', 'email' => 'thinkphp@admin.com'
        ];
        model('Admin')->test($data);
    }
}