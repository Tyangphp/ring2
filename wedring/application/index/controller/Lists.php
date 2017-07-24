<?php
/**
 * @Author: Marte
 * @Date:   2017-07-11 19:34:39
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-23 18:08:01
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
        //获取用户名称
        if (!empty(session('username'))) {
            $username = session('username');
            $this->assign('username',$username);
        }

        $id = $_GET['id'];
        // 获取goods信息
        if ($id == 1) {
            $goods = $this->list->firstGoods();
        } else {
            $goods = $this->list->secondGoods();
        }

        //获取系列信息
        $nav = $this->list->selectNav();

         //获取种类信息
        $kind = $this->list->selectKind();

        //分页
        $page = $goods->render();

        // // 获取goods详细信息
        // $seegoods = $this->list->seeGoods($gid)[0];
        // dump($goods);

        //分配变量
        $this->assign('goods',$goods);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        $this->assign('page',$page);
        // $this->assign('news',$news);

        return $this->fetch();
    }

    public function help()
    {
        return $this->fetch();
    }
}