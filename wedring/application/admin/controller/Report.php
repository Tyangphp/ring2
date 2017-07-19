<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use admin\model\Manager;

class Report extends Base
{
	//首页展示	
    public function order()
    {
    	return $this->fetch();
	}
	//分帧右边展示	
	public function volume()
	{
		return $this->fetch();
	}
	//管理员退出
	public function member()
	{
		return $this->fetch();
	}
}
