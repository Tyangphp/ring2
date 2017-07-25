<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 21:34:21
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-25 16:06:18
 */
namespace app\index\controller;
use app\index\model\Cart as CartModel;
use app\index\model\Goods;

use think\Controller;
use think\Db;


class Cart extends Controller
{
    protected $cart;
    public function _initialize()
    {
        $this->cart = new cartModel();
    }

    //购物车
    public function cart()
    {
        $username = session('username');
        $uid = session('uid');

        $goods = $this->cart->selsctCart($uid);
        $count = $this->cart->countCart($uid);
        $price = 0;
        foreach ($goods as $key => $value) {
            $price = $price + $value['price_sale'];
        }
        // dump($goods);

        //分配变量
        $this->assign('username',$username);
        $this->assign('goods',$goods);
        $this->assign('count',$count);
        $this->assign('price',$price);

        return $this->fetch();
    }

    //删除购物车一条记录
    public function deleteCart()
    {
        $uid = session('uid');
        $gid = input('gid');
        if (!empty($gid)) {
            $this->cart->clearCart($uid,$gid);
            echo 1;
            return;
        } else {
            $this->cart->clearAllCart($uid);
            echo 2;
            return;
        }
    }

    //真爱协议
    public function cart_agreement()
    {
        $username = session('username');
        $uid = session('uid');

        //分配变量
        $this->assign('username',$username);
        return $this->fetch();
    }

    //提交订单
    public function cart_order()
    {
        $username = session('username');
        $uid = session('uid');

        $goods = $this->cart->selsctCart($uid);
        $count = $this->cart->countCart($uid);
        $price = 0;
        foreach ($goods as $key => $value) {
            $price = $price + $value['price_sale'];
        }
        // dump($goods);

        //分配变量
        $this->assign('username',$username);
        $this->assign('goods',$goods);
        $this->assign('count',$count);
        $this->assign('price',$price);
        return $this->fetch();
    }

    //订单提交成功
    public function cart_order_success()
    {
        $username = session('username');
        $uid = session('uid');

        $goods = $this->cart->selsctCart($uid);
        $price = 0;
        foreach ($goods as $key => $value) {
            $price = $price + $value['price_sale'];
        }

        $ordernumb = date("Ymd",time()) . rand(100000,999999);
        // dump($ordernumb);

        //分配变量
        $this->assign('username',$username);
        $this->assign('ordernumb',$ordernumb);
        $this->assign('price',$price);
        return $this->fetch();
    }
}