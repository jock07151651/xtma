<?php


namespace app\admin\controller;

use app\admin\model\Config as ConfigModel;
use app\BaseController;

class Config extends BaseController
{
    // 系统设置
    public function sys_set() {

        $config = new ConfigModel();
        if (request()->isPost()) {
            $data = input('post.');
            // 遍历修改系统参数
            foreach ($data['res'] as $k => $v) {
                $config->updateConfigSiteData($k,$v);
            }
        }

        // 查询指定系统参数
        $configData = $config->getConfigSiteList();

        return view('pc/config/sys_set',[
            'configData' => $configData,
        ]);
    }
}