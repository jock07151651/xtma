<?php
/**
 * Sys : 草莓信息分类系统
 * User: 绿茶科技公司
 * Date:2020/9/15 0015 下午 3:58
 */

namespace app\index\model;


class Information extends BaseModel
{
    // 查询分类信息下的商品
    public function getCateInfoList($size=15) {
        return self::alias('i')->field('i.*,i2.price')
            ->join('information_2 i2','i2.iid=i.id')->order('i.id desc')->paginate($size);
    }
}