<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/14 0014 下午 2:21
 */

namespace app\admin\controller;

use app\admin\model\Member as MemberModel;
use app\BaseController;

class Member extends BaseController
{
    public function user_list() {
        $user = new MemberModel();
        $userList = $user->getUserList();

        return view('pc/user/user_list',[
            'userList' => $userList,
        ]);
    }
}