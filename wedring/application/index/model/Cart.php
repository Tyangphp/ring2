<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 21:35:43
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-26 20:44:49
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Cart extends Model
{
    //商品插入购物车
    public function insertCart($data)
    {
        return Db::name('cart')->insert($data);
    }

    //查看购物车中是否有gid=$gid的商品
    public function seeCart($gid,$uid)
    {
        $data = Db::name('cart')->where('gid',$gid)->where('uid',$uid)->select();
        return $data;
    }

    //查看购物车中对应uid下的商品
    public function selsctCart($uid)
    {
        $data = Db::name('cart')->alias('c')->where('uid',$uid)->join('goods g','g.gid=c.gid')->select();
        return $data;
    }

    //查看购物车中对应uid下的商品数量
    public function countCart($uid)
    {
        $data = Db::name('cart')->where('uid',$uid)->count();
        return $data;
    }

    //清除购物车列表对应gid的信息
    public function clearCart($uid,$gid)
    {
        $data = Db::name('cart')->where('uid',$uid)->where('gid',$gid)->limit(1)->delete();
        return $data;
    }

    //清除购物车列表对应uid的信息
    public function clearAllCart($uid)
    {
        $data = Db::name('cart')->where('uid',$uid)->delete();
        return $data;
    }
}