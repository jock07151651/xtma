<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/14 0014 下午 2:21
 */

namespace app\admin\controller;

use app\admin\model\Member as MemberModel;
use app\admin\model\MemberLevel as MemberLevelModel;

use app\BaseController;

class Member extends BaseController
{
    // 会员列表
    public function user_list() {
        $user = new MemberModel();
        $userList = $user->getUserList();

        return view('pc/member/user_list',[
            'userList' => $userList,
        ]);
    }

    // 会员添加
    public function user_add() {
        $member = new MemberModel();
        $memberLevel = new MemberLevelModel();
        if (request()->isPost()) {
            $data = input('post.');

            // 添加会员用户
            $result = $member->saveAndEditMember($data['data']);
            if ($result) {
                return json(['code' => 1]);
            }
            return json(['code' => 0]);
        }
        // 查询会员等级
        $memberData = $memberLevel->getMemberLevel();
        return view('pc/member/user_add',[
            'memberData' => $memberData,
        ]);
    }

    // 会员修改
    public function user_edit() {
        return view('pc/member/user_edit');
    }

    // 会员删除
    public function user_del() {
        $member = new MemberModel();
        $id = input('id');
        $result = $member->detMemberByID($id);
        if ($result) {
            return json(['code' => 1]);
        }
        return json(['code' => 0]);
    }
}