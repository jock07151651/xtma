<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/14 0014 下午 2:25
 */

namespace app\admin\model;


class Config extends BaseModel
{
    /**
     * 获取系统设置参数列表
     */
    public function getConfigSiteList($size=9) {
        return self::where('description','like','Site%')
            ->paginate($size);

    }

    /**
     *修改系统设置参数
     */
    public function updateConfigSiteData($where,$data) {
        return self::where('description',$where)->update(['value'=>$data]);
    }
}
