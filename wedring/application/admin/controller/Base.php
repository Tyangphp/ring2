<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller
{

	public function _initialize()
	{
		if (!session('?mangerName')) {
			$this->error("登陆啊，兄弟",'admin/login/index');
		}
	}
}