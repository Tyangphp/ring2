<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use admin\model\Manager;
use think\Db;

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
		$msign = Db::name('manage_sign')->limit(5)->order('sid DESC')->select();
		$this->assign('msign',$msign);
		return $this->fetch();
	}
	//管理员退出
	public function mnout()
	{
		session('mangerName',null);
		$this->success('您辛苦了', 'admin/login/index');
	}
}
