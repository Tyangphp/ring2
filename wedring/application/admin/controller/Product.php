<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\ProductM;
use think\Db;
use think\Request;

class Product extends Base
{
	//首页展示	
    public function s_product()
    {
    	$scode = input('get.ss');
    	if (!$scode) {
    		$goods = model('ProductM')->proInfo();
	    	$page = $goods->render();
			$this->assign('page',$page);
	    	$this->assign('goods',$goods);
			return $this->fetch();
    	}else{
    		$goods = model('ProductM')->ssproInfo($scode);
	    	$page = '以上为搜索结果';
	    	$this->assign('page',$page);
	    	$this->assign('goods',$goods);
			return $this->fetch();
    	}
    	
	}
	
	//添加商品页面
	public function s_addpuct()
	{
		return $this->fetch();
	}

	//添加商品
	public function addpuct()
	{
		
		//分割规格
		$sftn = explode('，' , $_POST['specification']);
		$size = $sftn[1];
		$quality = $sftn[2];
		$weight = $sftn[0];


		//上传图片
			$file = request()->file('goodsimg');
	        
	        // 移动到框架应用根目录/public/uploads/ 目录下
	        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
	        if($info){
	            $picad =  "/uploads/".$info->getSaveName();
	             $picads = str_replace("\\","/",$picad);
	            }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	            die;
	        }
	        
		//插入商品
		$insgoods = Db::name('goods')->insert(['gname'=>$_POST['gname'],
                'kid'=>$_POST['kid'],
                'nid'=>$_POST['nid'],
                'cost_price'=>$_POST['cost_price'],
                'price_sale'=>$_POST['price_sale'],
                'count'=>$_POST['count'],
                'size'=>$size,
                'quality'=>$quality,
                'weight'=>$weight,
                'images'=>$picads
            ]);

		if ($insgoods) {
             $this->success('添加成功', 'admin/product/s_product');
         } else {
             $this->error('请核实表单', 'admin/product/s_product');
         }
	}

	//上架商品
	public function uppuct()
	{
		$gid = input('id');
		$up = Db::name('goods')->where('gid',$gid)->update(['is_up'=>1]); 
		if ($up) {
			echo 1;
			die;
		}
	}

	//下架商品
	public function dwpuct()
	{
		$gid = input('id');
		$dw = Db::name('goods')->where('gid',$gid)->update(['is_up'=>0]); 
		if ($dw) {
			echo 1;
			die;
		}
	}

	//删除商品
	public function delpuct()
	{
		$gid = input('id');
		$del = Db::name('goods')->where('gid',$gid)->delete(); 
		if ($del) {
			echo 1;
			die;
		}
	}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	//种类管理页面
	public function s_category()
	{
		$kind =  model('ProductM')->kindInfo();
		$page = $kind->render();
		$this->assign('page',$page);
		$this->assign('kind',$kind);
		return $this->fetch();
	}

	//添加种类
	public function addCategory()
	{
		$sid = $_POST['dl'];
		$classname = $_POST['xl'];
		$kind =  model('ProductM')->addKind($sid,$classname);
		if($kind){
			echo 1;
		}else{
			echo 2;
		}
	}

	//删除种类
	public function delKind()
	{
		$kid = $_POST['kid'];

		$kind =  model('ProductM')->delKind($kid);
		if($kind){
			echo 1;
		}else{
			echo 2;
		}
	}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	//系列管理页面
	public function s_series()
	{
		$series =  model('ProductM')->seriesInfo();
		$page = $series->render();
		$this->assign('page',$page);
		$this->assign('series',$series);
		return $this->fetch();
	}

	//添加种类
	public function addSeries()
	{
		$sid = $_POST['dl'];
		$classname = $_POST['xl'];
		$series =  model('ProductM')->addSeries($sid,$classname);
		if($series){
			echo 1;
		}else{
			echo 2;
		}
	}

	//删除系列
	public function delSeries()
	{
		$nid = $_POST['nid'];

		$delseries =  model('ProductM')->delseries($nid);
		if($delseries){
			echo 1;
		}else{
			echo 2;
		}
	}
	//测试
	public function test()
	{
		$nid = 10;

		
	}
}
