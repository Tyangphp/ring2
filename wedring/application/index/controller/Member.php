<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 22:00:08
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-26 21:27:23
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
        // dump($msg);
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
                } else {
                    $val['order_state'] = '已发货';
                }
            }
        }
        dump($news);

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

    public function member_order_detail()
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

        //分配变量
        $this->assign('username',$username);
        $this->assign('counts',$counts);
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);

        return $this->fetch();
    }
}