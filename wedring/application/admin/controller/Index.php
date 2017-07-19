<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use admin\model\Manager;

class Index extends Base
{
	//首页展示	
    public function index()
    {
    	$manager = model('Manager');
    	$suname = session('mangerName'); 
    	$mname = $manager->manageInfo($suname)['username'];
		$this->assign('mname',$mname);
		return $this->fetch();
	}
	//分帧右边展示	
	public function right()
	{
		return $this->fetch();
	}
	//管理员退出
	public function mnout()
	{
		session('mangerName',null);
		$this->success('您辛苦了', 'admin/login/index');
	}
}
