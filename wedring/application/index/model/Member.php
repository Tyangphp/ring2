<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 21:59:20
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-27 17:53:28
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Member extends Model
{
    //订单信息及对应的商品信息
    public function goodsOrder($uid)
    {
        $data = Db::name('order')->alias('o')->where('uid',$uid)->where('order_state','>',0)->join('order_goods d','d.oid=o.oid')->join('goods g','g.gid=d.gid')->field('o.oid,o.order_state,o.pay_state,o.text,o.total_price,o.create_time,d.gid,d.unit_price,g.gname,g.images')->select();
        return $data;
    }

     //某一个订单信息及对应的商品信息
    public function oneGoodsOrder($uid,$oid)
    {
        $data = Db::name('order')->alias('o')->where('o.uid',$uid)->where('o.oid',$oid)->join('order_goods d','d.oid=o.oid')->join('goods g','g.gid=d.gid')->join('order_address a','a.uid=o.uid')->field('o.oid,o.order_state,o.pay_state,o.text,o.total_price,o.fms,o.create_time,d.gid,d.unit_price,g.gname,g.color,g.weight,g.quality,g.size,g.images,a.realname,a.tel,a.postcode,a.address')->select();
        return $data;
    }

    //取消的订单信息及对应的商品信息
    public function cancelGoodsOrder($uid)
    {
        $data = Db::name('order')->alias('o')->where('uid',$uid)->where('order_state',0)->join('order_goods d','d.oid=o.oid')->join('goods g','g.gid=d.gid')->field('o.oid,o.order_state,o.pay_state,o.text,o.total_price,o.create_time,d.gid,d.unit_price,g.gname,g.images')->select();
        return $data;
    }

    //取消订单时，更新订单状态
    public function updateOrderState($oid,$order_state)
    {
        return $this->name('order')->where('oid',$oid)->update(['order_state'=>$order_state]);
    }

    //删除订单
    public function goOut($oid)
    {
        return $this->name('order')->where('oid',$oid)->delete();
    }

    //查看订单地址
    public function seeAddress($uid)
    {
        $data = $this->name('order_address')->where('uid',$uid)->field('realname,address,tel,postcode')->select();
        return $data;
    }

    //新增地址插入数据库
    public function insertAdd($data)
    {
        return $this->name('order_address')->insert($data);
    }
}