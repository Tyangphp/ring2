<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class MemberM extends Model
{
	//意见箱信息
	public function replyInfo()
	{
		$data = Db::name('suggest')->paginate(2);
		return $data;
	}

	//所有用户
	public function userInfo()
	{
		$data = Db::name('users')->paginate(3);
		return $data;
	}

	//模糊搜索
	public function ssusInfo($stime,$etime)
	{
		$data = Db::name('users')->where("create_time between '$stime' and '$etime'")->paginate(3);
		return $data;
	}

	//删除用户所有信息
	public function delall($uid)
	{
		$data = Db::name('users')->where('uid',$uid)->delete();
		$data2 = Db::name('user')->where('id',$uid)->delete();

		return $data?true:false;
	}

	//禁止用户
	public function stopus($uid)
	{
		$data = Db::name('users')->where('uid',$uid)->update(['is_stop'=>'1']); 
		return $data?true:false;
	}

	//导出excel
	public function ssexcel()
	{
		$data = Db::name('users')->select();
		return $data;
	}
}
