<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/15 0015 下午 5:40
 */

namespace app\index\controller;


use app\index\model\BaseModel;

class Information extends BaseModel
{
    public function detail() {
        return view('pc/information/detail');
    }
}