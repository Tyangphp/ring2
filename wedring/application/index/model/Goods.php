<?php
/**
 * @Author: Marte
 * @Date:   2017-07-21 15:50:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-26 10:58:45
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Goods extends Model
{
    // 查询数据库商品分类表商品分类
    public function series($id)
    {
        $data = Db::name('goods_series')->where('id',$id)->field('id,sname')->select();
        return $data;
    }

    // 查询数据库商品种类表商品种类
    public function kind($gid)
    {
        $data = Db::name('goods')->alias('g')->where('gid',$gid)->join('goods_kind k','k.id=g.kid')->select();
        return $data;
    }

    // 查询数据库商品系列表商品系列
    public function nav($gid)
    {
        $data = Db::name('goods')->alias('g')->where('gid',$gid)->join('goods_nav n','n.id=g.nid')->select();
        return $data;
    }
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>求婚钻戒>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // 查询数据库商品表求婚钻戒
    public function selectGoods()
    {
        // $data = Db::name('goods')->where('kid','>=','8')->field('gid,nid,gname,color,weight,sales,price_sale,images')->limit(4)->select();
        $data = Db::name('goods')->alias('g')->join('goods_nav n','n.id=g.nid')->limit(4)->select();
        return $data;
    }

    // 查询数据库商品表所有求婚商品
    public function firstGoods()
    {
        $data = Db::name('goods')->where('kid','>=','8')->field('gid,nid,gname,color,weight,sales,price_sale,images')->paginate(8);
        return $data;
    }

    //查询数据库商品表对应nid系列的求婚商品
    public function firstGoodsNav($nid)
    {
        $data = Db::name('goods')->where("nid",$nid)->where("kid",'>=',"8")->field('gid,nid,gname,color,weight,sales,price_sale,images')->paginate(8);
        return $data;
    }

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>礼物商品>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    // 查询数据库商品表所有礼物商品
    public function secondGoods()
    {
        $data = Db::name('goods')->where('kid','<','8')->field('gid,nid,gname,color,weight,sales,price_sale,images')->paginate(8);
        return $data;
    }

     // 查询数据库商品表对应kid的礼物商品
    public function secondGood($kid)
    {
        $data = Db::name('goods')->where('kid',$kid)->field('gid,nid,gname,color,weight,sales,price_sale,images')->paginate(8);
        return $data;
    }

    //查询数据库商品表对应nid系列的礼物商品
    public function secondGoodsNav($nid)
    {
        $data = Db::name('goods')->where("nid",$nid)->where('kid','<','8')->field('gid,nid,gname,color,weight,sales,price_sale,images')->paginate(8);
        return $data;
    }


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    //查询数据库商品表对应nid系列的所有商品
    public function allGoodsNav($nid)
    {
        $data = Db::name('goods')->where("nid",$nid)->field('gid,nid,gname,color,weight,sales,price_sale,images')->paginate(8);
        return $data;
    }

    //查询数据库商品表所有系列的所有商品
    public function allGoods()
    {
        $data = Db::name('goods')->where("nid",">",'0')->field('gid,nid,gname,color,weight,sales,price_sale,images')->paginate(8);
        return $data;
    }
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    //查询数据库商品系列表
    public function selectNavs()
    {
        $data = Db::name('goods_nav')->where('id','>','1')->field('id,sid,nname')->select();
        return $data;
    }
    public function selectNav()
    {
        $data = Db::name('goods_nav')->where('id','>','2')->field('id,sid,nname')->select();
        return $data;
    }

    //查询数据库商品种类表
    public function selectKind()
    {
        $data = Db::name('goods_kind')->where('id','<','8')->field('id,sid,classname')->select();
        return $data;
    }

    // 查询商品详细信息
    public function seeGoods($gid)
    {
        $data = Db::name('goods')->where('gid',$gid)->field('gid,nid,gname,color,review,collected,size,quality,weight,sales,price_sale,images')->select();
        return $data;
    }

    // 查询商品所属系列
    public function seeGoodsNav($nid)
    {
        $data = Db::name('goods_nav')->where('id',$nid)->field('id,sid,nname')->select();
        return $data;
    }

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>统计商品数量>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    //统计所有商品
    public function statGoods()
    {
        $data = Db::name('goods')->count();
        return $data;
    }

    //统计所有nid = $nid的商品
    public function statGoodsNid($nid)
    {
        $data = Db::name('goods')->where('nid',$nid)->count();
        return $data;
    }

    //id = 1
    //统计id=1下的所有商品
    public function statFirstGoods()
    {
        $data = Db::name('goods')->where('kid','>=','8')->count();
        return $data;
    }

    //统计nid下的所有商品
    public function statFirstGoodsNid($nid)
    {
        $data = Db::name('goods')->where('nid',$nid)->where('kid','>=','8')->count();
        return $data;
    }

    //id = 2
    //统计id=2下的所有商品
    public function statSecondGoods()
    {
        $data = Db::name('goods')->where('kid','<','8')->count();
        return $data;
    }

    //统计nid下的所有商品
    public function statSecondGoodsNid($nid)
    {
        $data = Db::name('goods')->where('nid',$nid)->where('kid','<','8')->count();
        return $data;
    }

    //统计kid下的所有商品
    public function statSecondGoodsKid($kid)
    {
        $data = Db::name('goods')->where('kid',$kid)->count();
        return $data;
    }

//>>>>>>>>>>>>>>>>>>>>>>>>>加入订单后数量-1>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    public function easeCount($gid)
    {
        return Db::name('goods')->where('gid',$gid)->setDec('count');
    }
}