<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Ad extends Model
{
	//全部广告信息
	public function adInfo()
	{
		$data = Db::name('news')->paginate(2);
		return $data;
	}
	//单个广告
	public function singleInfo($nid)
	{
		$data = Db::name('news')->where('nid',$nid)->select();
		return $data;
	}
	//单个广告
	public function ssadInfo($ss)
	{
		$data = Db::name('news')->where("title like '%$ss%'")->paginate(2);
		return $data;
	}
}
