<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\OrderM;
use think\Db;
use extend\alidayu\TopClient;
use extend\alidayu\AlibabaAliqinFcSmsNumSendRequest;
use extend\mycurl\MyCurl;

class Order extends Base
{
	//订单展示	
    public function s_order()
    {
    	$scode = input('get.ss');
    	if (!$scode) {
    		$orders = model('OrderM')->ordersInfo();
	    	$page = $orders->render();
			$this->assign('page',$page);
	    	$this->assign('orders',$orders);

			return $this->fetch();
    	}else{
    		$orders = model('OrderM')->ssorderInfo($scode);
	    	$page = '以上为搜索结果';
			$this->assign('page',$page);
	    	$this->assign('orders',$orders);
			return $this->fetch();
    	}
	}
	
	//订单详情页面
	public function Order_detailed()
	{
		$oid = input('oid');
	    $sorder = model('OrderM')->sorderInfo($oid)[0];
	    $this->assign('sorder',$sorder);
	    
		return $this->fetch();
	}
	
	//删除订单
	public function delorder()
	{
		$oid = input('id');
	    $delorder = Db::name('order')->where('oid',$oid)->delete();
	    if ($delorder) {
	    	echo 1;
	    }
	    
	}
	//待发货订单页面
	public function s_omanage()
	{
		$scode = input('get.ss');
    	if (!$scode) {
    		$wtorder = model('OrderM')->wtorderInfo();
    		$page = $wtorder->render();
			$this->assign('wtorder',$wtorder);
		    $this->assign('page',$page);
			return $this->fetch();
    	}else{
    		$wtorder = model('OrderM')->sswtorderInfo($scode);
    		$page = '以上为搜索结果';
			$this->assign('wtorder',$wtorder);
		    $this->assign('page',$page);
			return $this->fetch();
    	}
		
	}

	//发送短信
	public function sendmsg()
	{
		//查询数据
		$oid = input('order');
		$msginfo = model('OrderM')->msginfo($oid);
		//分配变量
		$phone = $msginfo['tel'];
        $name = "顾客";
        $kdnumb = input('kdnum');
        //发送短信  
         $c = new TopClient;
         //222222APPKEY
        $c->appkey = "24537892";
        $c->secretKey = "6365ca1a286cc633b11d31708c368b3d";
        //请求对象，需要配置请求的参数
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend("123456");
        $req->setSmsType("normal");
        //个人签名
        $req->setSmsFreeSignName("刘春阳");
        //短信模板变量
        $req->setSmsParam("{\"name\":\"$name\",\"kdnumb\":\"$kdnumb\"}");
        //手机号
        $req->setRecNum($phone);
        $req->setSmsTemplateCode("SMS_76435050");
        $resp = $c->execute($req);   

        //更新订单状态
        $fms = input('admin-role');
        $sendgoods = model('OrderM')->sendgoods($oid,$fms,$kdnumb);
        if ($sendgoods) {
             $this->success('发送成功', 'admin/order/s_omanage');
         } else {
             $this->error('认证失败', 'admin/order/s_omanage');
         }
	}
	
	//物流
	public function logicis()
	{
		//使用Curl模拟请求
		$url = "http://v.juhe.cn/exp/index?com=yd&no=3973210243695&dtype=&key=b4b4fb964bb2399fad7b4aa3bc632eb6";
		$curl = MyCurl::get($url);
		$arr = json_decode($curl,true);
		//分配变量
		$title = "快递公司：".$arr['result']['company']."快递单号：".$arr['result']['no']; 
		$content = $arr['result']['list'];
		
		$this->assign('title',$title);
		$this->assign('content',$content);
		return $this->fetch();
	}
}