<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Manager extends Model
{
	public function manageInfo($username)
	{
		$data = Db::name('manage')->where('username',$username)->find();
		return $data;
	}

}