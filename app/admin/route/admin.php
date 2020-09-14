<?php

// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

/**
 *
 *
 */

// 后台主页
Route::rule('index','Index/index','get|post');
Route::rule('welcome','Index/welcome','get|post');

// 后台系统设置
Route::rule('sys_set','Config/sys_set','get|post');

// 后台会员
Route::rule('user_list','Member/user_list','get|post');
