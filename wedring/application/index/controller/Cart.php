<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 21:34:21
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-28 10:38:46
 */
namespace app\index\controller;
use app\index\model\Cart as CartModel;
use app\index\model\Goods;
use app\index\model\Order;

use think\Controller;
use think\Db;


class Cart extends Controller
{
    protected $cart;
    protected $order;
    protected $goods;
    public function _initialize()
    {
        $this->cart = new cartModel();
        $this->order = new Order();
        $this->goods = new Goods();
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

    //删除购物车记录
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
        // dump(input());
        $address = $this->order->takeAddress($uid);
        // dump($address);

        //分配变量
        $this->assign('username',$username);
        $this->assign('goods',$goods);
        $this->assign('count',$count);
        $this->assign('price',$price);
        $this->assign('address',$address);
        return $this->fetch();
    }

    //先将新增地址插入数据库
    public function newAdres()
    {
        $username = session('username');
        $uid = session('uid');

        if (!empty(input())) {
            $address = input('address');
            $realname = input('realname');
            $tel = input('tel');
            $postcode = input('postcode');

            //收货人新增地址插入收货地址表
            $data = ['uid'=>$uid,'realname'=>$realname,'tel'=>$tel,'postcode'=>$postcode,'address'=>$address];
            $this->order->newAdres($data);
            echo 1;
            return;
        }
    }

    //订单信息插入数据库
    public function insertAddress()
    {
        $username = session('username');
        $uid = session('uid');

        if (!empty(input())) {
            $address = input('address');
            $realname = input('realname');
            $tel = input('tel');
            $postcode = input('postcode');
            $text = input('text');

            $oldad = $this->order->slectOrderAddress($uid,$address);
            if (empty($oldad)) {
                //收货人信息插入收货地址表
                $msg = ['uid'=>$uid,'realname'=>$realname,'tel'=>$tel,'postcode'=>$postcode,'address'=>$address];
                $this->order->insertOrderAddress($msg);
            }

            //订单号
            $ordernumb = date("Ymd",time()) . rand(100000,999999);

            $goods = $this->cart->selsctCart($uid);
            $price = 0;
            foreach ($goods as $key => $value) {
                //总价格
                $price = $price + $value['price_sale'];
                //商品信息插入订单商品表
                $data = ['gid'=>$value['gid'],'oid'=>$ordernumb,'unit_price'=>$value['price_sale']];
                $this->order->insertOrderGoods($data);
                $this->goods->easeCount($value['gid']);
            }

            //订单信息插入订单表
            $system = ['oid'=>$ordernumb,'uid'=>$uid,'order_state'=>1,'text'=>$text,'total_price'=>$price,'tel'=>$tel,'oaddress'=>$address];
            $this->order->insertOrder($system);
            echo $ordernumb;
            return;
        }
    }

    //订单提交成功
    public function cart_order_success()
    {
        $username = session('username');
        $uid = session('uid');

        //订单号
        $ordernumb = $_GET['ordernumb'];
        session('ordernumb',$ordernumb);

        $price = $this->order->slectOrder($ordernumb)[0];

        //分配变量
        $this->assign('username',$username);
        $this->assign('ordernumb',$ordernumb);
        $this->assign('price',$price);
        return $this->fetch();
    }

    //支付完成
    public function pay()
    {
        $uid = session('uid');
        $ordernumb = session('ordernumb');

        //订单号
        // $ordernumb = $_GET['ordernumb'];
        $order_state = input('order_state');
        if ($order_state == 2) {
            $this->order->updateState($uid,$ordernumb);
            echo 1;
            return;
        }
    }
}