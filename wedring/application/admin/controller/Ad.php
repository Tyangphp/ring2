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

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('upfile');
        
        if (empty($file)) {
            echo "没有图片阿";
            //$this->error('请您上传商品图片', '/admin/ad/s_ad');
            die;
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if(!$info){
                dump($this->error($file->getError()));
                die;
            }
        } 
        // //图片地址
        $picads = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        dump($picads);
        // $pfbtime = date('Y-m-d H:i:s', time());
        // //插入商品
        // $uppro = Db::name('product')->insert(['pname'=>$_POST['pname'],
        //         'pjieshao'=>$_POST['pjieshao'],
        //         'pdlcode'=>$_POST['pdlcode'],
        //         'pxlcode'=>$_POST['pxlcode'],
        //         'pscprice'=>$_POST['pscprice'],
        //         'psum'=>$_POST['psum'],
        //         'pstyle'=>$_POST['pstyle'],
        //         'pfbtime'=>$pfbtime,
        //         'pbaozhuang'=>$_POST['pbaozhuang'],
        //         'pphoto'=>$pphoto
        //     ]);
        // if (1 == $uppro) {
        //         $this->success('广告添加成功', 'admin/ad/s_ad');
        //      } else {
        //          $this->error('请核实你您的表单', 'admin/ad/s_ad');
        //      }

    }
}