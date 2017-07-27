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
		$data = Db::name('role,wedring_role_user,wedring_manage')
				->where("wedring_role.id = wedring_role_user.role_id and wedring_role_user.user_id = wedring_manage.id")
				->select();
		return $data;
	}

	//所有角色信息查询
	public function powerinfo()
	{
		$res = Db::name('role,wedring_role_user,wedring_manage')
				->where("wedring_role.id = wedring_role_user.role_id and wedring_role_user.user_id = wedring_manage.id")
				->select();
		$newbl = [];
	    foreach ($res as $ri => $ral) {
	     	$newbl[$ral["name"]][] = $ral;
	     } 
	     return $newbl;
	}
	//所有权限
	public function allnodeInfo()
	{
		 $res = Db::name('node')
				->where("pid <> 0")
				->select();

		$newres = [];
	    foreach ($res as $rk => $rv) {
	     	$newres[$rv["pid"]][] = $rv;
	     	
	     } 
	     foreach ($newres as $nk => $nv) {
	     	
	     	$pname = Db::name('node')->where('id',$nv[0]['pid'])->find()['title'];
	     	$newres[$nk]['pname'] = $pname;
	     }
		return $newres;
	}
}