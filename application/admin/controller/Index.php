<?php

namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    //重复登录过滤
    public function initialize() {
        if (session('?admin.id')) {
            $this->redirect('admin/home/index');
        }
    }

    //后台登录
    public function login() {
        if ($this->request->isAjax()) {
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
            ];
            $result = model('Admin')->login($data);
            if ($result == 1) {
                $this->success('登录成功!', 'admin/home/index');
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

    //忘记密码
    public function forget() {
        if ($this->request->isAjax()) {
            //随机数生成验证码
            $code = mt_rand(1000, 9999);
            //这里会给前端页面正确的验证码，存在session中
           session('code', $code);
            $result = mailto(input('post.email'), '重置密码验证码.', '验证码是:'.$code);
            if ($result) {
                $this->success('验证码发送成功!');
            } else {
                $this->error('验证码发送失败!');
            }
        }
        return view();
    }

    //重置密码
    public function reset() {
        $data = [
            'code' => input('post.code'),
            'email' => input('post.email')
        ];
        $result = model('Admin')->reset($data);
        if ($result == 1) {
            $this->success('密码重置成功，请去邮箱查看新密码!', 'admin/index/login');
        } else {
            $this->error($result);
        }
    }
}