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
	//添加管理员
	public function add_administrator()
	{
		return $this->fetch();
	}
	//管理员列表
	public function s_admlist()
	{
		$all = model('Manager')->allmaInfo();
		$this->assign('all',$all);
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
	//个人信息修改
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
	//停用管理员
	public function stpadm()
	{
		$mid = input('id');

		$stm = Db::name('manage')->where('id',$mid)->update(['is_stop'=>1]); 
		if ($stm) {
			echo 1;
			die;
		}
	}
	//启用管理员
	public function stadm()
	{
		$mid = input('id');

		$stm = Db::name('manage')->where('id',$mid)->update(['is_stop'=>0]); 
		if ($stm) {
			echo 1;
			die;
		}
	}

	//添加管理员
	public function addadm()
	{
		//dump(input());
		//插入管理员表
		$insma = Db::name('manage')->insert(['username'=>$_POST['username'],
                'password'=>md5($_POST['userpassword']),
                'tel'=>$_POST['tel'],
                'email'=>$_POST['email']
            ]);
		if (!$insma) {
             $this->error('请核实你的信息', '/admin/admin/add_administrator');
         	die;
         } 
        //成功后插入权限 
         $roid = model('Manager')->manageInfo($_POST['username'])['id'];
         $insrole = Db::name('role_user')->insert(['role_id'=>$_POST['admin-role'],
                'user_id'=>$roid
            ]);
         if ($insrole) {
             $this->success('添加成功', '/admin/admin/s_admlist');
         }else{
             $this->error('添加失败', '/admin/admin/s_admlist');

         }
	}
}