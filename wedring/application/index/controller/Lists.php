<?php
/**
 * @Author: Marte
 * @Date:   2017-07-11 19:34:39
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-24 17:41:18
 */
namespace app\index\controller;
use app\index\model\Goods;
// use app\index\model\User as UserModel;

use think\Controller;
use think\Db;

class Lists extends Controller
{
    protected $list;
    public function _initialize()
    {
        // $this->list = new IndexModel();
        $this->list = new Goods();
    }
    public function lists()
    {
        // $data = input();
        // var_dump($data);
        // die;

        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $this->assign('username',$username);
        }

        // 获取goods信息
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            if ($id == 1) {
                if (!empty($_GET['nid'])) {
                    $nid = $_GET['nid'];
                    $goods = $this->list->firstGoodsNav($nid);
                    $count = $this->list->statFirstGoodsNid($nid);
                    // dump($count);

                } elseif (!empty($_GET['kid'])) {
                    $kid = $_GET['kid'];
                    $goods = $this->list->secondGood($kid);
                    $count = $this->list->statSecondGoodsKid($kid);
                    // dump($count);
                } else {
                    $goods = $this->list->firstGoods();
                    $count = $this->list->statFirstGoods();
                    // dump($count);
                }
            }else {
                if (!empty($_GET['kid'])) {
                    $kid = $_GET['kid'];
                    $goods = $this->list->secondGood($kid);
                    $count = $this->list->statSecondGoodsKid($kid);
                    // dump($count);
                } elseif (!empty($_GET['nid'])) {
                    $nid = $_GET['nid'];
                    $goods = $this->list->secondGoodsNav($nid);
                    $count = $this->list->statSecondGoodsNid($nid);
                    // dump($count);
                } else {
                    $goods = $this->list->secondGoods();
                    $count = $this->list->statSecondGoods();
                    // dump($count);
                }
            }
        } elseif (!empty($_GET['nid'])) {
            $nid = $_GET['nid'];
            $goods = $this->list->allGoodsNav($nid);
            $count = $this->list->statGoodsNid($nid);
        } else {
            $goods = $this->list->allGoods();
            $count = $this->list->statGoods();
        }

        //获取系列信息
        $navs = $this->list->selectNavs();
        $nav = $this->list->selectNav();

         //获取种类信息
        $kind = $this->list->selectKind();

        //分页
        $page = $goods->render();
        $pages = ceil($count / 8);
        //页数
        if (empty($_GET['page']) || $_GET['page'] == 1) {
            $pagenation = 1;
        } else {
            $pagenation = $_GET['page'];
        }

        // dump($goods);

        //分配变量
        $this->assign('goods',$goods);
        $this->assign('count',$count);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        $this->assign('page',$page);
        $this->assign('pages',$pages);
        $this->assign('pagenation',$pagenation);
        // $this->assign('news',$news);

        return $this->fetch();
    }

    public function help()
    {
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $this->assign('username',$username);
        }

        //获取系列信息
        $navs = $this->list->selectNavs();
        $nav = $this->list->selectNav();

        //获取种类信息
        $kind = $this->list->selectKind();

        //分配变量
        // $this->assign('goods',$goods);
        $this->assign('navs',$navs);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        // $this->assign('news',$news);

        return $this->fetch();
    }
}