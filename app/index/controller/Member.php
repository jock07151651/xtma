<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/15 0015 下午 12:35
 */

namespace app\index\controller;


use app\BaseController;

class Member extends BaseController
{
    public function user_login() {
        return view('pc/member/user_login');
    }

    public function user_register() {
        return view('pc/member/user_register');
    }
}