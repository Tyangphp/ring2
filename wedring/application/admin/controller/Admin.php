<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Admin extends Base
{
	//会员展示	
    public function s_adm()
    {
		return $this->fetch();
	}
	
	//留言页面
	public function s_addpwr()
	{
		return $this->fetch();
	}
	
	//回复留言
	public function s_admlist()
	{
		return $this->fetch();
	}
	//回复留言
	public function s_adminfo()
	{
		return $this->fetch();
	}
}