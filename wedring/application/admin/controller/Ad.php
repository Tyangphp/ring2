<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Ad as Sad;

class Ad extends Base
{
	//广告展示	
    public function s_ad()
    {
    	$scode = input('get.ss');
    	if (!$scode) {
    		$ad = model('ad')->adInfo();
	        $page = $ad->render();
	        $this->assign('page',$page);
	    	$this->assign('ad',$ad);
			return $this->fetch();
    	}else{
    		$ad =  model('ad')->ssadInfo($scode);

    		$page = '以上为搜索结果';
	        $this->assign('page',$page);
	    	$this->assign('ad',$ad);
			return $this->fetch();
    	}
    	
	}
	//删除广告
	public function delad()
    {
    	$nid = $_GET['nid'];
    	
	}
	//广告图片	
    public function ad_pic()
    {
    	$sad = $_GET['nid'];
    	$ad = model('ad')->singleInfo($sad)[0];
    	$this->assign('ad',$ad);
		return $this->fetch();
	}
}