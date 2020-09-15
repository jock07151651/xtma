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
use think\facade\Route;

// 前台主页
Route::rule('/','Index/index','get|post');

// 前台分类列表信息
Route::rule('list/:listID','Category/cate_list','get|post');
// 分类信息中商品详情
Route::rule('detail/:iID','Information/detail','get|post');

// 用户登录
Route::rule('user_login','Member/user_login','get|post');
Route::rule('user_register','Member/user_register','get|post');


