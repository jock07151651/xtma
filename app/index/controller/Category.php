<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/15 0015 下午 3:08
 */

namespace app\index\controller;

use app\index\model\Information as InformationModel;
use app\BaseController;

class Category extends BaseController
{
    public function cate_list() {
        $information = new InformationModel();

        // 查询分类

        // 查询分类下的商品
        $cateInfoList = $information->getCateInfoList();

        return view('pc/category/cate_list',[
            'cateInfoList' => $cateInfoList,
            'categoryRes' => $this->categoryRes,
            'cateFive' => $this->cateFive,
        ]);
    }
}