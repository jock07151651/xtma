<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/15 0015 下午 2:01
 */

namespace app\index\model;


class Category extends BaseModel
{
    // 查询所有分类信息
    public function getCategoryList() {
        return self::select();
    }

    //顶级和二级分类获取
    public function getCates(){
        $cateRes=$this->where(array('parentid'=>0))->select();
        foreach ($cateRes as $k => $v) {
            $cateRes[$k]['children']=$this->where(array('parentid'=>$v['catid']))->paginate(2);
            $cateRes[$k]['childrens']=$this->where(array('parentid'=>$v['catid']))->select();
        }
        return $cateRes;
    }

    //通过顶级分类id获取二级和三级子分类
    public function getSonCates($id){
        $cateRes=$this->where(array('parentid'=>$id))->select();//获取二级分类
        foreach ($cateRes as $k => $v) {
            $cateRes[$k]['children']=$this->where(array('parentid'=>$v['catid']))->select();//获取三级分类
        }
        return $cateRes;
    }

    // 首页显示5调数据
    public function getIndexCateFive($limit=5) {
        return self::paginate($limit);
    }
}