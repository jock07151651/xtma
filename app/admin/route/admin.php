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
Route::rule('index','admin/Index/index','get|post');
Route::rule('welcome','Index/welcome','get|post');

// 后台系统设置
Route::rule('sys_set','Config/sys_set','get|post');

// 后台会员
Route::rule('user_list','Member/user_list','get|post');
Route::rule('user_add','Member/user_add','get|post');
Route::rule('user_del','Member/user_del','get|post');
Route::rule('user_edit','Member/user_edit','get|post');

// 后台分类
Route::rule('cate_list','Category/cate_list','get|post');
Route::rule('cate_edit/:catid','Category/cate_edit','get|post');
Route::rule('cate_del','Category/cate_del','get|post');