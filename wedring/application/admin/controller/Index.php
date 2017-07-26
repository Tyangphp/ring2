<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use admin\model\Manager;
use think\Db;

class Index extends Base
{
	//首页展示	
    public function index()
    {
		//查询用户信息
    	$manager = model('Manager');
    	$suname = session('mangerName'); 
    	$mname = $manager->manageInfo($suname)['username'];
    	//便利板块数组
    	$blban = $manager->roleInfo($suname);
    	
  		$this->assign('mname',$mname);
  		$this->assign('blban',$blban);

		return $this->fetch();
	}
	//分帧右边展示	
	public function right()
	{	//管理员登录记录
		$msign = Db::name('manage_sign')->limit(5)->order('sid DESC')->select();
		$this->assign('msign',$msign);
		//商品销量记录
		$uorder = Db::name('goods')->order('sales DESC')->limit(7)->select();
        
        foreach ($uorder as $key => $value) {
            $j = $key + 1;
			$pc = $value['gid'];
            $pxx = Db::name('goods')->where("gid = $pc")->select()[0];
            $uorder[$key]['ph'] = $j;
        }
		$this->assign('uorder',$uorder);
      
		return $this->fetch();
	}
	//管理员退出
	public function mnout()
	{
		session('mangerName',null);
		$this->success('您辛苦了', 'admin/login/index');
	}

	//测试
	public function test()
	{
		//测试1
		$manager = model('Manager');
		$blban = $manager->roleInfo('yangge');
		foreach ($blban as $onek => $onev) {
				foreach ($onev as $twok => $twov) {
					if (array_key_exists('name', $twov)) {
						echo $twov['name']."<br/>";
					}else{
						echo "空白"."<br/>";
					}
					
					
				}
			}	

		echo "<hr/>";
		echo "<hr/>";
		echo "<hr/>";
		dump($blban);
		
		



	}
}
