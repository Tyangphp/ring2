<?php
/**
 * @Author: Marte
 * @Date:   2017-07-11 19:34:39
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-22 17:51:55
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
        }
        // 获取goods信息
        $goods = $this->list->selectGoods();

        //获取系列信息
        $nav = $this->list->selectNav();

         //获取种类信息
        $kind = $this->list->selectKind();

        // $gid = $_GET['gid'];
        // // 获取goods详细信息
        // $seegoods = $this->list->seeGoods($gid)[0];
        // dump($seegoods);

        //分配变量
        $this->assign('username',$username);
        $this->assign('goods',$goods);
        $this->assign('nav',$nav);
        $this->assign('kind',$kind);
        // $this->assign('seegoods',$seegoods);
        // $this->assign('news',$news);

        return $this->fetch();
    }

    public function help()
    {
        return $this->fetch();
    }
}