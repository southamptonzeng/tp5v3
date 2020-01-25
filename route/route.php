<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::rule('admin', 'admin/index/login', 'get');

Route::rule('admin', 'admin/index/login', 'post');

Route::rule('admin/register', 'admin/index/register', 'get');

Route::rule('admin/register', 'admin/index/register', 'post');

Route::rule('admin/test', 'admin/index/test', 'get');
