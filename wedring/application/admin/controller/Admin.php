<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use admin\model\Manager;
use think\Db;

class Admin extends Base
{
	//会员展示	
    public function s_adm()
    {
		return $this->fetch();
	}
	
	//权限页面
	public function s_addpwr()
	{
		return $this->fetch();
	}
	
	//管理员列表
	public function s_admlist()
	{
		return $this->fetch();
	}
	//管理员信息
	public function s_adminfo()
	{
		$suname = session('mangerName'); 
    	
    	$mname = model('Manager')->manageInfo($suname);

    	$this->assign('mname',$mname);
		return $this->fetch();
	}
	//
	public function edtminfo()
	{
		$suname = session('mangerName'); 
		$result = Db::name('manage')->where('username',$suname)->update(['username'=>$_POST['username'],
				'password'=>md5($_POST['surname']),
				'tel'=>$_POST['phone'],
				'email'=>$_POST['mailbox']
				]); 
        if ($result) {
             $this->success('更新成功', 'admin/admin/s_adminfo');
         } else {
             $this->error('更新失败', 'admin/admin/s_adminfo');
         }
	}
}