<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 22:00:08
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-28 11:14:59
 */
namespace app\index\controller;
use app\index\model\Member as MemberModel;
use app\index\model\Goods;
use app\index\model\Cart;

use think\Controller;
use think\Db;


class Member extends Controller
{
    protected $me;
    protected $member;
    protected $cart;
    public function _initialize()
    {
        $this->me = new MemberModel();
        $this->member = new Goods();
        $this->cart = new Cart();
    }

    //个人首页
    public function member_index()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');

        //我的购物车中商品数量
        $counts = $this->cart->countCart($uid);

        //查看待处理订单
        $orderCount = $this->me->order($uid);

        // 获取goods信息
        $goods = $this->member->selectGoods();
        $sid = $goods[0]['sid'];
        session('sid',$sid);

        //获取系列信息
        $navs = $this->member->selectNavs();
        $nav = $this->member->selectNav();

         //获取种类信息
        $kind = $this->member->selectKind();

        //浏览过的商品
        $seeGoods = $this->me->liuLan($uid);

        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('orderCount',$orderCount);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        $this->assign('seeGoods',$seeGoods);

        return $this->fetch();
    }

    //我的订单
    public function member_order()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');

        //我的购物车中商品数量
        $counts = $this->cart->countCart($uid);

        // 获取goods信息
        $goods = $this->member->selectGoods();
        $sid = $goods[0]['sid'];
        session('sid',$sid);

        //获取系列信息
        $navs = $this->member->selectNavs();
        $nav = $this->member->selectNav();

         //获取种类信息
        $kind = $this->member->selectKind();

        //订单信息及对应的商品信息
        $msg = $this->me->goodsOrder($uid);
        $qmsg = $this->me->cancelGoodsOrder($uid);
        // dump($msg);

        // 查看已取消订单
        $qnews = [];
        foreach ($qmsg as $qkey => $qvalue) {
            $qnews[$qvalue["oid"]][] = $qvalue;
        }

        foreach ($qnews as $qkey => &$qvalue) {
            // dump($value[0]);
            foreach ($qvalue as $qkey => &$qval) {
                if ($qval['order_state'] == 0) {
                    $qval['order_state'] = '已取消订单';
                }
            }
        }
        // dump($qnews);

        //查看订单
        $news = [];
        foreach ($msg as $key => $value) {
            $news[$value["oid"]][] = $value;
        }

        foreach ($news as $key => &$value) {
            foreach ($value as $key => &$val) {
                if ($val['order_state'] ==1 ) {
                    $val['order_state'] = '未付款';
                } elseif ($val['order_state'] == 2) {
                    $val['order_state'] = '未发货';
                } elseif ($val['order_state'] == 3) {
                    $val['order_state'] = '已发货';
                } elseif ($val['order_state'] == 4) {
                    $val['order_state'] = '已退货';
                } else {
                    $val['order_state'] = '已取消订单';
                }
            }
        }
        // dump($news);

        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        $this->assign('news',$news);
        $this->assign('qnews',$qnews);

        return $this->fetch();
    }

    //取消订单，退货
    public function cancel()
    {
        $oid = input('oid');
        $order_state = input('order_state');
        if (!empty($oid)) {
            if ($order_state == 0) {
                $this->me->updateOrderState($oid,$order_state);
                echo 1;
                return;
            }

            if ($order_state == 4) {
                $this->me->updateOrderState($oid,$order_state);
                echo 2;
                return;
            }

            if ($order_state == 5) {
                $this->me->goOut($oid);
                echo 3;
                return;
            }
        }
    }

    public function member_order_detail()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');
        $oid = $_GET['oid'];
        // dump($oid);die;

        //我的购物车中商品数量
        $counts = $this->cart->countCart($uid);

        // 获取goods信息
        $goods = $this->member->selectGoods();
        $sid = $goods[0]['sid'];
        session('sid',$sid);

        //获取系列信息
        $navs = $this->member->selectNavs();
        $nav = $this->member->selectNav();

         //获取种类信息
        $kind = $this->member->selectKind();

        //订单信息及对应的商品信息
        $msg = $this->me->oneGoodsOrder($uid,$oid);

        //查看订单
        $news = [];
        foreach ($msg as $key => $value) {
            $news[$value["oid"]][] = $value;
        }

        foreach ($news as $key => &$value) {
            foreach ($value as $key => &$val) {
                if ($val['order_state'] ==1 ) {
                    $val['order_state'] = '未付款';
                } elseif ($val['order_state'] == 2) {
                    $val['order_state'] = '未发货';
                } elseif ($val['order_state'] == 3) {
                    $val['order_state'] = '已发货';
                } elseif ($val['order_state'] == 4) {
                    $val['order_state'] = '已退货';
                } else {
                    $val['order_state'] = '已取消订单';
                }
            }
        }
       

        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        $this->assign('news',$news);

        return $this->fetch();
    }

    public function member_collect()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');

        //我的购物车中商品数量
        $counts = $this->cart->countCart($uid);

        // 获取goods信息
        $goods = $this->member->selectGoods();
        $sid = $goods[0]['sid'];
        session('sid',$sid);

        //获取系列信息
        $navs = $this->member->selectNavs();
        $nav = $this->member->selectNav();

         //获取种类信息
        $kind = $this->member->selectKind();

        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);

        return $this->fetch();
    }

    public function member_info()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');

        //我的购物车中商品数量
        $counts = $this->cart->countCart($uid);

        // 获取goods信息
        $goods = $this->member->selectGoods();
        $sid = $goods[0]['sid'];
        session('sid',$sid);

        //获取系列信息
        $navs = $this->member->selectNavs();
        $nav = $this->member->selectNav();

         //获取种类信息
        $kind = $this->member->selectKind();

        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);

        return $this->fetch();
    }

    public function member_pwd()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');

        //我的购物车中商品数量
        $counts = $this->cart->countCart($uid);

        // 获取goods信息
        $goods = $this->member->selectGoods();
        $sid = $goods[0]['sid'];
        session('sid',$sid);

        //获取系列信息
        $navs = $this->member->selectNavs();
        $nav = $this->member->selectNav();

         //获取种类信息
        $kind = $this->member->selectKind();

        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);

        return $this->fetch();
    }

    public function member_addr()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');

        //我的购物车中商品数量
        $counts = $this->cart->countCart($uid);

        // 获取goods信息
        $goods = $this->member->selectGoods();
        $sid = $goods[0]['sid'];
        session('sid',$sid);

        //获取系列信息
        $navs = $this->member->selectNavs();
        $nav = $this->member->selectNav();

        //获取种类信息
        $kind = $this->member->selectKind();

        //查看订单地址
        $address = $this->me->seeAddress($uid);
        // dump($address);
        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        $this->assign('address',$address);

        return $this->fetch();
    }

    //添加地址
    public function adres()
    {
        //获取用户名称
        $username = session('username');
        $uid = session('uid');

        $realname = input('realname');
        $tel = input('tel');
        $postcode = input('postcode');
        $address = input('address');

        $data = ['uid'=>$uid,'realname'=>$realname,'tel'=>$tel,'postcode'=>$postcode,'address'=>$address,];
        if (!empty(input())) {
            $this->me->insertAdd($data);
            echo 1;
            return;
        }
    }
}