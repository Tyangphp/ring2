<?php
/**
 * @Author: Marte
 * @Date:   2017-07-21 15:50:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-21 16:52:07
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Goods extends Model
{
    // 查询数据库商品表
    public function selectGoods()
    {
        $data = Db::name('goods')->where('kid','1')->field('gid,nid,gname,weight,sales,price_sale,images')->limit(4)->select();
        return $data;
    }
}