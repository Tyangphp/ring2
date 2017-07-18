<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Ad extends Base
{
	//订单展示	
    public function s_ad()
    {
		return $this->fetch();
	}
	
}