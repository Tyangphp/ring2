<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 21:59:20
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-26 20:29:09
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Member extends Model
{
    //订单信息及对应的商品信息
    public function goodsOrder($uid)
    {
        $data = Db::name('order')->alias('o')->where('uid',$uid)->join('order_goods d','d.oid=o.oid')->join('goods g','g.gid=d.gid')->select();
        return $data;
    }
}