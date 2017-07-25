<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Login as Mlogin;
use think\Db;

class Login extends Controller
{
	
    public function index()
    {	
		return $this->fetch();
	}
	//审核管理员
	public function checkmager(Mlogin $Mlogin)
	{

		//验证验证码
		if (input('code')) {
			$code = input('code');
			$captcha = new \think\captcha\Captcha();
                if (!$captcha->check($code)) {
	                echo 0;
	                die;
                } else {
                	echo 1;
                	die;
                }
		}
		//验证管理员信息
		if (input('uname')) {
				$uname = input('uname');
	       		$upass = input('upass');
				
				$ckpass = $Mlogin->checkup($uname,$upass);
	                if (!$ckpass) {
		                echo 2;
		                die;
	                } else {
		                echo 7;
		                session('mangerName',$uname);
		                $logsign = Db::name('manage_sign')->insert(['mname'=>$uname]); 
	                }
		}
	}
	//测试
	public function test()
	{
		//查询权限
		$roleid = 2;
		$ro_no = Db::name('access')->where('role_id',2)->find()['node_id'];      
	    $forno = explode(',', $ro_no);
	    //遍历所有小数组
	    $allxl = [];
	    foreach ($forno as $key => $value) {
	    	$sno = Db::name('node')->where('id',$value)->find();
	    	$allxl[] = $sno;
	    }
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
	    dump($newbl);
	}



}
