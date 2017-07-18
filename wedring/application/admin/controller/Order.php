<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Order extends Base
{
	//订单展示	
    public function s_order()
    {
		return $this->fetch();
	}
	
	//订单详情页面
	public function Order_detailed()
	{
		return $this->fetch();
	}
	
	//待发货订单页面
	public function s_omanage()
	{
		return $this->fetch();
	}
	//退款页面
	public function s_tmanage()
	{
		return $this->fetch();
	}
}