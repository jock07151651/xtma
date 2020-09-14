<?php
namespace app\admin\controller;

use app\BaseController;

class Index extends BaseController
{
    // 后台主页
    public function index()
    {
        return view('pc/index/index');
    }

    // 后台欢迎页
    public function welcome() {
        return view('pc/index/welcome');
   }


}
