<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Ad as Sad;
use think\Request;

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
    	$csad =  model('ad')->delad($nid);
        if ($csad) {
            $this->success("删除成功",'admin/ad/s_ad');
        } else {
            $this->error("删除失败",'admin/ad/s_ad');
        }
	}
	//广告图片	
    public function ad_pic()
    {
    	$sad = $_GET['nid'];
    	$ad = model('ad')->singleInfo($sad)[0];
    	$this->assign('ad',$ad);
		return $this->fetch();
	}
    //添加广告
    public function addad()
    {
        dump($_POST);
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('upfile');
        
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $picads =  "/uploads/".$info->getSaveName();
            }else{
            // 上传失败获取错误信息
            echo $file->getError();
            die;
        }
        //插入商品
        $addad = model('ad')->addad($_POST['title'],$_POST['content'],$picads);
        
        if ($addad) {
                $this->success('广告添加成功', 'admin/ad/s_ad');
             } else {
                 $this->error('请核实你您的表单', 'admin/ad/s_ad');
             }

    }
}