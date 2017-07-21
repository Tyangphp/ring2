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
				// $uname = 'yangge';
	   //     		$upass = '611888';
				
				// $ckpass = $Mlogin->checkup($uname,$upass);
	   //              if (!$ckpass) {
	   //              echo 2;
	   //              } else {
	   //              echo 7;
	   //              }
	   //              
	   $data = Db::name('manage')->where('username','yangge')
				->alias('m') //命名别名
				->join('manage_sign s','m.username=s.mname')
				->field('sid')
				->select();      
	    
	}



}
