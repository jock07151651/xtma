<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/14 0014 下午 2:21
 */

namespace app\admin\controller;

use app\admin\model\Category as CategoryModel;
use app\admin\model\MemberLevel as MemberLevelModel;

use app\BaseController;
use catetree\Catetree;

class Category extends BaseController
{
    // 分类列表
    public function cate_list() {

        $category = new CategoryModel();
        $cateTree = new Catetree();

        // 新增分类
        if (request()->isPost()) {
            $data = input('data');
            $result = $category->SaveAndEditCategory($data);
            if ($result !== false) {
                return json(['code' => 1]);
            }
            return json(['code' => 0]);
        }

        // 无限极分类
        $cateRes = $category->getCateList();
        $cateTreeList = $cateTree->catetree($cateRes);

        return view('pc/category/cate_list',[
            'cateTreeList' => $cateTreeList,
        ]);
    }

    // 删除分类
    public function cate_del() {
        $category = new categoryModel();
        $cateTree = new Catetree();
        $id = input('id');
        // 获取当前分类的子分类的id
        $sonIDs = $cateTree->childrenIDs($id,$category);
        $sonIDs[] = intval($id);

        // 遍历里面的分类id
        foreach ($sonIDs as $k => $v) {
            // 通过获取的id，查询到对应catid，再删除对应field字段
            $categoryList = $category->getCategoryListByID($v);
            foreach ($categoryList as  $k1=>$v1) {
                $category->delCategoryByID($v1['catid']);
            }
        }
        return json(['code'=>1]);
    }

    public function cate_edit($catid) {

        $category = new CategoryModel();
        $cateTree = new Catetree();

        // 无限极分类
        $cateRes = $category->getCateList();
        $cateTreeList = $cateTree->catetree($cateRes);

        // 获取列表传递过来的id，查询对应的分类信息
        $cateData = $category->getCateByID($catid);

        return view('pc/category/cate_edit',[
            'cateTreeList' => $cateTreeList,
            'cateData' => $cateData,
        ]);
    }
}