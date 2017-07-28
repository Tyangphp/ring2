<?php
/**
 * @Author: Marte
 * @Date:   2017-07-26 09:58:08
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-28 09:18:32
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Order extends Model
{
    //商品信息插入订单商品表
    public function insertOrderGoods($data)
    {
        return Db::name('order_goods')->insert($data);
    }

    //先将新增地址插入数据库
    public function newAdres($data)
    {
        return $this->name('order_address')->insert($data);
    }

    //收货人信息插入收货地址表
    public function insertOrderAddress($msg)
    {
        return Db::name('order_address')->insert($msg);
    }

    //从收货地址表查看是否有该地址
    public function slectOrderAddress($uid,$address)
    {
        $data = Db::name('order_address')->where('uid',$uid)->where('address',$address)->select();
        return $data;
    }

    //从收货地址表该该用户的地址
    public function takeAddress($uid)
    {
        $data = Db::name('order_address')->where('uid',$uid)->field('uid,tel,postcode,realname,address')->select();
        return $data;
    }

    //商品信息插入订单表
    public function insertOrder($system)
    {
        return Db::name('order')->insert($system);
    }

    //从订单表获取订单号和总价
    public function slectOrder($ordernumb)
    {
        $data = Db::name('order')->where('oid',$ordernumb)->field('total_price')->select();
        return $data;
    }

    //更新订单状态
    public function updateState($uid,$ordernumb)
    {
        return $this->name('order')->where('uid',$uid)->where('oid',$ordernumb)->update(['order_state'=>2,'pay_state'=>1]);
    }
}