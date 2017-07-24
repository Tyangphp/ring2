<?php
/**
 * @Author: Marte
 * @Date:   2017-05-11 09:42:46
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-24 21:23:24
 */
namespace app\index\controller;
use extend\open_example_php\open51094_class;
use app\index\model\Index as IndexModel;
use app\index\model\Goods;

use think\Controller;
use think\Db;


class Index extends Controller
{
    protected $index;
    public function _initialize()
    {
        $this->index = new IndexModel();
        $this->index = new Goods();
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
            session('openId',$openId);
            // 获取goods信息
            $goods = $this->index->selectGoods();

            //获取系列信息
            $navs = $this->index->selectNavs();
            $nav = $this->index->selectNav();

             //获取种类信息
            $kind = $this->index->selectKind();

            // //分配变量
            $this->assign('username',$username);
            $this->assign('goods',$goods);
            $this->assign('navs',$navs);
            $this->assign('nav',$nav);
            $this->assign('kind',$kind);
            // $this->assign('news',$news);
            return $this->fetch();
        } elseif (!empty(session('username'))) {//手机或邮箱登录
            //获取Session值
            $username = session('username');

           // 获取goods信息
            $goods = $this->index->selectGoods();

            //获取系列信息
            $navs = $this->index->selectNavs();
            $nav = $this->index->selectNav();

             //获取种类信息
            $kind = $this->index->selectKind();

            //分配变量
            $this->assign('username',$username);
            $this->assign('goods',$goods);
            $this->assign('navs',$navs);
            $this->assign('nav',$nav);
            $this->assign('kind',$kind);
            // $this->assign('news',$news);
            return $this->fetch();
        } else {
            // 获取goods信息
            $goods = $this->index->selectGoods();

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

    public function detail()
    {
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $this->assign('username',$username);
        }

        $gid = $_GET['gid'];
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
        }

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

    public function brand()
    {
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $this->assign('username',$username);
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
        return $this->fetch();
    }

    public function active()
    {
        return $this->fetch();
    }
}