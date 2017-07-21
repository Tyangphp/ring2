<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use admin\model\Manager;

class Report extends Base
{
	//订单报表	
    public function order()
    {
    	return $this->fetch();
	}
	//销量报表
	public function volume()
	{
		return $this->fetch();
	}
	//会员报表
	public function member()
	{
		return $this->fetch();
	}
	
}
