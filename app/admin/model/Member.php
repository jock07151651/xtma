<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/14 0014 下午 5:01
 */

namespace app\admin\model;


class Member extends BaseModel
{
    public function getUserList($size = 10) {
        return self::order('id desc')
            ->paginate($size);
    }
}