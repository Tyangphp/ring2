<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 21:34:21
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-24 21:55:20
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
        $this->cart = new Goods();
    }

    //购物车
    public function cart()
    {
        $username = session('username');

        //分配变量
        $this->assign('username',$username);

        return $this->fetch();
    }

    //支付
    public function cart_agreement()
    {
        return $this->fetch();
    }

    //支付
    public function cart_order()
    {
        return $this->fetch();
    }

    //支付
    public function cart_order_success()
    {
        return $this->fetch();
    }
}