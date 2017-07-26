<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class OrderM extends Model
{
	//全部订单信息
	public function ordersInfo()
	{
		$data = Db::name('order')->paginate(3);
		return $data;
	}
	//订单详情
	public function sorderInfo($oid)
	{
		$data = Db::name('goods')
				->alias('g') //命名别名
				->join('order_goods o','g.gid=o.gid')
				->where('oid',$oid)
				->select();
		return $data;
	}
	//模糊搜索
	public function ssorderInfo($ss)
	{
		$data = Db::name('order')->where("oid like '%$ss%'")->select();
		return $data;
	}

	//待发货订单
	public function wtorderInfo()
	{
		$data = Db::name('order,wedring_order_goods,wedring_goods')
				->where('wedring_order.oid = wedring_order_goods.oid and wedring_goods.gid = wedring_order_goods.gid and wedring_order.order_state = 1')
				->select();

		$newdata = [];
		    foreach ($data as $ki => $val) {
		     	$newdata[$val["oid"]][] = $val;
		     } 

		return $newdata;
	}
	//模糊搜索未发货
	public function sswtorderInfo($ss)
	{
		$data = Db::name('order,wedring_order_goods,wedring_goods')
				->where("wedring_order.oid = wedring_order_goods.oid and wedring_goods.gid = wedring_order_goods.gid and wedring_order.order_state = 1 and wedring_order.oid = '$ss'")
				->select();

		$newdata = [];
	    foreach ($data as $ki => $val) {
	     	$newdata[$val["oid"]][] = $val;
	     } 
		return $data;
	}
	//短信信息
	public function msginfo($oid)
	{
		$data = Db::name('order')->where('oid',$oid)->find();
		return $data;
    }
    //发货更新
    public function sendgoods($oid,$fms,$fmsnum)
    {
    	$uporder = Db::name('order')->where('oid',$oid)->update(['fms'=>$fms,'fmsnum'=>$fmsnum,'order_state'=>2]); 
    	return $uporder;
    }



}
