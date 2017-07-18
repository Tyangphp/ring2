<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Product extends Base
{
	//首页展示	
    public function s_product()
    {
		return $this->fetch();
	}
	
	//添加商品页面
	public function s_addpuct()
	{
		return $this->fetch();
	}
	
	//分类管理页面
	public function s_category()
	{
		return $this->fetch();
	}
}
