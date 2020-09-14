<?php


namespace app\admin\model;


class MemberLevel extends BaseModel
{
    public function getMemberLevel() {
        return self::select();
    }
}