<?php
/**
 * @Author: Marte
 * @Date:   2017-05-11 09:42:46
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-21 17:03:27
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
            // //查询数据库，获取goods信息
            // $goods = Goods::where('gid','>',0)->paginate(4);

            // //查询数据库，获取nav信息
            // $classname = Nav::where('cid',2)->select()[0];
            // //根据nav的cid获取goods信息
            // $class_goods = Goods::where('cid',$classname['cid'])->paginate(4);
            // //foreach遍历修改content

            // //查询数据库，获取news信息
            // $news = News::where('nid','>',0)->paginate(4);

            // //遍历获取title和content的部分内容
            // foreach ($news as $key => &$value) {
            //     $value['title'] = mb_substr($value['title'],0,12,'utf-8') . '...';
            //     $value['content'] = mb_substr(ltrim($value['content'],'<p/>'),0,50,'utf-8') . '...';
            // }

            // //分配变量
            $this->assign('username',$username);
            // $this->assign('goods',$goods);
            // $this->assign('classname',$classname);
            // $this->assign('class_goods',$class_goods);
            // $this->assign('news',$news);
            return $this->fetch();
        } elseif (!empty(session('username'))) {//手机或邮箱登录
            //获取Session值
            $username = session('username');

            // //查询数据库，获取goods信息
            // $goods = Goods::where('gid','>',0)->paginate(4);

            // //查询数据库，获取nav信息
            // $classname = Nav::where('cid',2)->select()[0];
            // //根据nav的cid获取goods信息
            // $class_goods = Goods::where('cid',$classname['cid'])->paginate(4);
            // //foreach遍历修改content

            // //查询数据库，获取news信息
            // $news = News::where('nid','>',0)->paginate(4);

            // //遍历获取title和content的部分内容
            // foreach ($news as $key => &$value) {
            //     $value['title'] = mb_substr($value['title'],0,12,'utf-8') . '...';
            //     $value['content'] = mb_substr(ltrim($value['content'],'<p/>'),0,50,'utf-8') . '...';
            // }

            //分配变量
            $this->assign('username',$username);
            // $this->assign('goods',$goods);
            // $this->assign('classname',$classname);
            // $this->assign('class_goods',$class_goods);
            // $this->assign('news',$news);
            return $this->fetch();
        } else {
            // //查询数据库，获取goods信息
            // $goods = Goods::where('gid','>',0)->paginate(4);
            $data = $this->index->selectGoods();
            dump($data);
            // die;

            //分配变量
            $this->assign('data',$data);
            // $this->assign('goods',$goods);
            // $this->assign('classname',$classname);
            // $this->assign('class_goods',$class_goods);
            // $this->assign('news',$news);
            return $this->fetch();
        }
    }

    public function detail()
    {
        return $this->fetch();
    }

    public function brand()
    {
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

    //contact
    // public function contact()
    // {
    //     //获取Session值
    //     $username = session('username');

    //     //分配变量
    //     $this->assign('username',$username);
    //     return $this->fetch();
    // }

    // public function message()
    // {
    //     //获取Session值
    //     $username = session('username');

    //     //分配变量
    //     $this->assign('username',$username);
    //     return $this->fetch();
    // }
}