<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/14 0014 下午 5:01
 */

namespace app\admin\model;


class Member extends BaseModel
{
    // 查询每页10条用户数据
    public function getUserList($size = 10) {
        return self::order('id desc')
            ->paginate($size);
    }

    // 更新 或 添加用户
    public function saveAndEditMember($data,$id=0) {
        return self::save($data,$id);
    }

    // 删除用户
    public function detMemberByID($id) {
        return self::where('id',$id)->delete();
    }
}