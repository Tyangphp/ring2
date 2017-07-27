<?php
/**
 * @Author: Marte
 * @Date:   2017-05-11 09:42:46
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-25 17:33:52
 */
namespace app\index\controller;
use extend\open_example_php\open51094_class;
use app\index\model\Index as IndexModel;
use app\index\model\Cart;
use app\index\model\Goods;

use think\Controller;
use think\Db;


class Index extends Controller
{
    protected $index;
    protected $cart;
    public function _initialize()
    {
        // $this->index = new IndexModel();
        $this->index = new Goods();
        $this->cart = new Cart();
    }
    public function index()
    {
        $open = new open51094_class();
        if (!empty($_GET)) {//第三方登录
            $code = $_GET['code'];
            $message = $open->me($code);
            // dump($message);

            $username = $message['name'];
            $img = $message['img'];
            $sex = $message['sex'];
            $openId = $message['uniq'];
            $from = $message['from'];

            session('username',$username);
            session('img',$img);
            session('sex',$sex);
            session('uid',$openId);


            //获取Session值
            $username = session('username');
            $uid = session('uid');

            //我的购物车中商品数量
            $counts = $this->cart->countCart($uid);

            // 获取goods信息
            $goods = $this->index->selectGoods();
            $sid = $goods[0]['sid'];
            session('sid',$sid);

            //获取系列信息
            $navs = $this->index->selectNavs();
            $nav = $this->index->selectNav();

             //获取种类信息
            $kind = $this->index->selectKind();

            // //分配变量
            $this->assign('username',$username);
            $this->assign('counts',$counts);
            $this->assign('goods',$goods);
            $this->assign('navs',$navs);
            $this->assign('nav',$nav);
            $this->assign('kind',$kind);
            // $this->assign('news',$news);
            return $this->fetch();
        } elseif (!empty(session('username'))) {//手机或邮箱登录
            //获取Session值
            $username = session('username');
            $uid = session('uid');

            //我的购物车中商品数量
            $counts = $this->cart->countCart($uid);

            // 获取goods信息
            $goods = $this->index->selectGoods();
            $sid = $goods[0]['sid'];
            session('sid',$sid);

            //获取系列信息
            $navs = $this->index->selectNavs();
            $nav = $this->index->selectNav();

             //获取种类信息
            $kind = $this->index->selectKind();

            //分配变量
            $this->assign('username',$username);
            $this->assign('counts',$counts);
            $this->assign('goods',$goods);
            $this->assign('navs',$navs);
            $this->assign('nav',$nav);
            $this->assign('kind',$kind);
            // $this->assign('news',$news);
            return $this->fetch();
        } else {
            // 获取goods信息
            $goods = $this->index->selectGoods();
            $sid = $goods[0]['sid'];
            session('sid',$sid);

            //获取系列信息
            $navs = $this->index->selectNavs();
            $nav = $this->index->selectNav();

             //获取种类信息
            $kind = $this->index->selectKind();

            //分配变量
            $this->assign('goods',$goods);
            $this->assign('navs',$navs);
            $this->assign('nav',$nav);
            $this->assign('kind',$kind);
            // $this->assign('news',$news);
            return $this->fetch();
        }
    }

    //商品详情
    public function detail()
    {
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $uid = session('uid');

            //我的购物车中商品数量
            $counts = $this->cart->countCart($uid);
            $this->assign('username',$username);
            $this->assign('counts',$counts);
        }

        $gid = $_GET['gid'];
        session('gid',$gid);
        // 获取goods信息
        $goods = $this->index->seeGoods($gid)[0];
        // dump($goods);

        //位置
        if (!empty(session('id'))) {
            $id = session('id');
            $goodsnavs = $this->index->kind($gid);
            $goodsnav = $this->index->series($id);
        } elseif (!empty(session('nid'))) {
            $nid = session('nid');
            $goodsnavs = $this->index->kind($gid);
            $goodsnav = $this->index->series($id);
        } elseif (!empty(session('sid'))) {
            $id = session('sid');
            $goodsnavs = $this->index->kind($gid);
            $goodsnav = $this->index->series($id);
        }
        // dump($id);

        //获取系列信息
        $navs = $this->index->selectNavs();
        $nav = $this->index->selectNav();

         //获取种类信息
        $kind = $this->index->selectKind();

        //分配变量
        $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('goodsnavs',$goodsnavs);
        $this->assign('goodsnav',$goodsnav);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        // $this->assign('class_goods',$class_goods);
        // $this->assign('news',$news);

        return $this->fetch();
    }

    //加入购物车
    public function intoCart()
    {
        if (empty(session('username'))) {
            echo 1;
            return;
        } else {
            $username = session('username');
            $gid = session('gid');
            $uid = session('uid');
            //数据存入数据库
            $data = ['uid'=>$uid,'gid'=>$gid];
            $this->cart->insertCart($data);
            echo 2;
            return;
        }
    }

    public function brand()
    {
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $uid = session('uid');

            //我的购物车中商品数量
            $counts = $this->cart->countCart($uid);
            $this->assign('username',$username);
            $this->assign('counts',$counts);
        }
        //获取系列信息
        $navs = $this->index->selectNavs();
        $nav = $this->index->selectNav();

         //获取种类信息
        $kind = $this->index->selectKind();

        // $gid = $_GET['gid'];
        // 获取goods信息
        // $goods = $this->index->seeGoods($gid)[0];
        // dump($goods);

        //分配变量
        // $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        // $this->assign('class_goods',$class_goods);
        // $this->assign('news',$news);
        return $this->fetch();
    }

    public function question()
    {
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $uid = session('uid');

            //我的购物车中商品数量
            $counts = $this->cart->countCart($uid);
            $this->assign('username',$username);
            $this->assign('counts',$counts);
        }
        return $this->fetch();
    }

    public function active()
    {
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $uid = session('uid');

            //我的购物车中商品数量
            $counts = $this->cart->countCart($uid);
            $this->assign('username',$username);
            $this->assign('counts',$counts);
        }
        return $this->fetch();
    }
    //阳哥地图
    public function yanggeditu()
    {
        return $this->fetch();
    }
}