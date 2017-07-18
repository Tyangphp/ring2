<?php
namespace app\admin\controller;
use app\admin\controller\Base;


class Close extends Base
{
	//站点关闭	
    public function close()
    {
		return $this->fetch();
	}
	
}