<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class ProductM extends Model
{
	//全部商品信息
	public function proInfo()
	{
		$data = Db::name('goods')->paginate(4);
		return $data;
	}

	public function adgoods()
	{
		
	}
	// //单个广告
	// public function singleInfo($nid)
	// {
	// 	$data = Db::name('news')->where('nid',$nid)->select();
	// 	return $data;
	// }
	//模糊搜索
	public function ssproInfo($ss)
	{
		$data = Db::name('goods')->where("gname like '%$ss%'")->select();
		return $data;
	}
	// //删除广告
	// public function delad($nid)
	// {
	// 	$data = Db::name('news')->where('nid',$nid)->delete();
	// 	return $data?true:false;
	// }
	// //添加广告
	// public function addad($title,$content,$pic)
	// {
	// $uppro = Db::name('news')->insert(['title'=>$title,
 //                'content'=>$content,
 //                'picture'=>$pic
 //            ]);
	// 	return $uppro?true:false;
 //    }



//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>种类管理>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	//所有种类（对戒）
	public function kindInfo()
	{
		$data = Db::name('goods_series')
				->alias('s') //命名别名
				->join('goods_kind k','s.id=k.sid')
				->paginate(3);
		return $data;
	}

	

	//删除种类
	public function delKind($kid)
	{
		$data = Db::name('goods_kind')->where('id',$kid)->delete();
		return $data;
	}

	

	//添加种类
	public function addKind($sid,$classname)
	{
		$data = Db::name('goods_kind')->insert(['sid'=>$sid,
                'classname'=>$classname
            ]);
		return $data;
	}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>系列管理>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	//系列
	public function seriesInfo()
	{
		$data = Db::name('goods_nav')->paginate(3);
		return $data;
	}

	

	//删除系列
	public function delseries($nid)
	{
		$data = Db::name('goods_nav')->where('id',$nid)->delete();
		return $data;
	}

	//添加系列
	public function addSeries($sid,$classname)
	{
		$data = Db::name('goods_nav')->insert(['sid'=>$sid,
                'nname'=>$classname
            ]);
		return $data;
	}
}
