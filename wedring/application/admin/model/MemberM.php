<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class MemberM extends Model
{
	//全部广告信息
	public function replyInfo()
	{
		$data = Db::name('suggest')->paginate(2);
		return $data;
	}
	// //单个广告
	// public function singleInfo($nid)
	// {
	// 	$data = Db::name('news')->where('nid',$nid)->select();
	// 	return $data;
	// }
	// //模糊搜索
	// public function ssadInfo($ss)
	// {
	// 	$data = Db::name('news')->where("title like '%$ss%'")->paginate(2);
	// 	return $data;
	// }
	// //删除广告
	// public function delad($nid)
	// {
	// 	$data = Db::name('news')->where('nid',$nid)->delete();
	// 	return $data?true:false;
	// }
}
