<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Member extends Base
{
	//会员展示	
    public function s_member()
    {
		return $this->fetch();
	}
	
	//留言页面
	public function s_reply()
	{
		return $this->fetch();
	}
	
	//回复留言
	public function add_reply()
	{
		return $this->fetch();
	}
}