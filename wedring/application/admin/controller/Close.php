<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Close extends Base
{
	//站点关闭	
    public function close()
    {
    	$istp = Db::name('preserve')->where('yangge',1)->value('is_close');
    	$this->assign('istp',$istp);
		return $this->fetch();
	}
	
	public function doclose()
	{
		$check = input('pwd');
		if (611888 == $check) {
			$stop = Db::name('preserve')->where('yangge = 1')->update(['is_close'=>1]); 
			if ($stop) {
	             $this->success('闭站成功', 'admin/close/close');
	         } else {
	             $this->error('闭站失败', 'admin/close/close');
	         }
		}else{
			$this->error('密码错误', 'admin/close/close');
		}
		
	}

	public function rev()
	{
		$check = input('pwd');
		if (611888 == $check) {
			$rev = Db::name('preserve')->where('yangge = 1')->update(['is_close'=>0]); 
			if ($rev) {
	             $this->success('开站成功', 'admin/close/close');
	         } else {
	             $this->error('开站失败', 'admin/close/close');
	         }
		}else{
			$this->error('密码错误', 'admin/close/close');
		}
		
	}
}