<?php
/**
 * @Author: Marte
 * @Date:   2017-07-21 15:50:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-21 21:38:36
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

    //查询数据库商品系列表
    public function selectNav()
    {
        $data = Db::name('goods_nav')->where('id','>','1')->field('id,sid,nname')->select();
        return $data;
    }

    //查询数据库商品种类表
    public function selectKind()
    {
        $data = Db::name('goods_kind')->where('id','>','0')->field('id,sid,classname')->select();
        return $data;
    }
}