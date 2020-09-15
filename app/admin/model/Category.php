<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/14 0014 下午 5:01
 */

namespace app\admin\model;


class Category extends BaseModel
{
    public function getCateList() {
        return self::select();
    }

    public function SaveAndEditCategory($data,$id='') {
        return self::save($data,$id);
    }

    public function delCategoryByID($id) {
        return self::where('catid',$id)->delete();
    }

    // 查询对应id的商品分类栏目列表
    public function getCategoryListByID($id) {
        return self::where('catid',$id)->select();
    }

    // 查询对应分类
    public function getCateByID($id) {
        return self::where('catid',$id)->find();
    }
}