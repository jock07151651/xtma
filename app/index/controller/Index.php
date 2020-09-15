<?php
namespace app\index\controller;

use app\BaseController;
use app\index\model\Category as CategoryModel;
use catetree\Catetree;

class Index extends BaseController
{
    public function index() {


        return view('pc/index/index',[
            'categoryRes' => $this->categoryRes,
            'cateFive' => $this->cateFive,
        ]);
    }


}
