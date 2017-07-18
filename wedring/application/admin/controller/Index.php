<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Index extends Base
{
	//首页展示	
    public function index()
    {
    	// $isLogin = session('username','','admin');
     //    if (!$isLogin) {
     //        return $this->error('请登陆，兄弟','/admin/login/index');
     //        die;
     //    }
		
		return $this->fetch();
	}
	//分帧右边展示	
	public function right()
	{
		return $this->fetch();
	}

}
