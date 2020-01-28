<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    //没有登录，会跳转到登录页
    public function initialize() {
        if (!session('?admin.id')) {
            $this->redirect('admin/index/login');
        }
    }
}
