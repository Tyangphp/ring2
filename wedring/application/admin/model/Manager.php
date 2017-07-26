<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Manager extends Model
{
	//单个管理员信息
	public function manageInfo($username)
	{
		$data = Db::name('manage')->where('username',$username)->find();
		return $data;
	}
	//权限遍历
	public function roleInfo($username)
	{
		$data = Db::name('manage')->where('username',$username)
				->alias('m') //命名别名
				->join('role_user r','m.id=r.user_id')
				->field('role_id')
				->find()['role_id'];  

		//查询权限
		$roleid = $data;
		$ro_no = Db::name('access')->where('role_id',$data)->find()['node_id'];      
	   
	    $forno = explode(',', $ro_no);
	    
	    //遍历所有小数组
	    $allxl = [];
	    foreach ($forno as $key => $value) {
	    	$sno = Db::name('node')->where('id',$value)->find();
	    	$allxl[] = $sno;
	    }
	    //dump($allxl);
	    //新数组
	    $newbl = [];
	    foreach ($allxl as $ki => $val) {
	     	$newbl[$val["pid"]][] = $val;
	     } 
	    //最终数组
	   
	     foreach ($newbl as $fnk => $fnv) {
	     	$pname = Db::name('node')
			->field('title')
			->where('id',$fnk)
			->find();
			$newbl["$fnk"]['pname'] = $pname;
	     }
	     return $newbl;
	}
	//所有管理员信息
	public function allmaInfo()
	{
		$data = Db::name('manage')
				->alias('m') //命名别名
				->join('role_user r','m.id=r.user_id')
				->select();
		return $data;
	}




}