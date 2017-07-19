<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Login extends Model
{
	public function checkup($username,$password)
	{
		$data = Db::name('manage')->where('username',$username)
					 ->where('password',md5($password))
					 ->find();
		return $data?true:false;
	}

}