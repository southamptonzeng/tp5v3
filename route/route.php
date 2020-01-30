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

//Route::rule('admin', 'admin/index/login', 'get');

//Route::rule('admin', 'admin/index/login', 'post');

//Route::rule('admin/register', 'admin/index/register', 'get');

//Route::rule('admin/register', 'admin/index/register', 'post');

//Route::rule('admin/test', 'admin/index/test', 'get');

Route::group('admin', function () {
    Route::rule('/', 'admin/index/login', 'get|post');
    Route::rule('register', 'admin/index/register', 'get|post');
    Route::rule('test', 'admin/index/test', 'get');
    Route::rule('forget', 'admin/index/forget', 'get|post');
    Route::rule('reset', 'admin/index/reset', 'post');
    Route::rule('index', 'admin/home/index', 'get');
    Route::rule('logout', 'admin/home/logout', 'post');
    Route::rule('catelist', 'admin/cate/list', 'get');
    Route::rule('cateadd', 'admin/cate/add', 'get|post');
});