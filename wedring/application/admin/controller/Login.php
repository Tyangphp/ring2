<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Login as Mlogin;
use think\Db;

class Login extends Controller
{
	
    public function index()
    {	
		return $this->fetch();
	}
	//审核管理员
	public function checkmager(Mlogin $Mlogin)
	{

		//验证验证码
		if (input('code')) {
			$code = input('code');
			$captcha = new \think\captcha\Captcha();
                if (!$captcha->check($code)) {
	                echo 0;
	                die;
                } else {
                	echo 1;
                	die;
                }
		}
		//验证管理员信息
		if (input('uname')) {
				$uname = input('uname');
	       		$upass = input('upass');
				
				$ckpass = $Mlogin->checkup($uname,$upass);
	                if (!$ckpass) {
		                echo 2;
		                die;
	                } else {
		                echo 7;
		                session('mangerName',$uname);
		                $logsign = Db::name('manage_sign')->insert(['mname'=>$uname]); 
	                }
		}
	}
	//测试
	public function test()
	{
		//查询权限
		$roleid = 2;
		$ro_no = Db::name('access')->where('role_id',2)->find()['node_id'];      
	    $forno = explode(',', $ro_no);
	    //遍历所有小数组
	    $allxl = [];
	    foreach ($forno as $key => $value) {
	    	$sno = Db::name('node')->where('id',$value)->find();
	    	$allxl[] = $sno;
	    }
	    //新数组
	    $newbl = [];
	    foreach ($allxl as $ki => $val) {
	     	$newbl[$val["pid"]][] = $val;
	     } 
	    //最终数组
	   
	     foreach ($newbl as $fnk => $fnv) {
	     	$pname = Db::name('node')
			->field('title')
			->where('id',$fnk)
			->find();
			$newbl["$fnk"]['pname'] = $pname;
	     }
	    dump($newbl);
	}

	public function test2()
	{
		// $data = Db::query('select * from wedring_order r,wedring_goods g,wedring_order_goods rg where r.oid = rg.oid and g.gid = rg.gid');
		// 	{
		// 	$res = Db::name('order,wed_image,wed_goods')
		// 			// ->field("wed_image.src")
		// 			->where("wed_order.gid = wed_image.gid and wed_image.gid = wed_goods.gid  and wed_order.state = 0")
		// 			->paginate(4);
		// 	return $res;
		// }
		//---测试2
		// $data = Db::name('order,wedring_order_goods,wedring_goods')
		// 		->where('wedring_order.oid = wedring_order_goods.oid and wedring_goods.gid = wedring_order_goods.gid and wedring_order.order_state = 1')
		// 		->paginate(1);



		// $newdata = [];
		//     foreach ($data as $ki => $val) {
		//      	$newdata[$val["oid"]][] = $val;
		//      } 
	 //     dump($newdata);
	 //     
	 //ceshi3
	 $res = Db::name('node')
				->where("pid <> 0")
				->select();

		$newres = [];
	    foreach ($res as $rk => $rv) {
	     	$newres[$rv["pid"]][] = $rv;
	     	
	     } 
	     foreach ($newres as $nk => $nv) {
	     	
	     	$pname = Db::name('node')->where('id',$nv[0]['pid'])->find()['title'];
	     	$newres[$nk]['pname'] = $pname;
	     }

	     foreach ($newres as $tsk => $tsv) {
	     	foreach ($tsv as $tsk2 => $tsv2) {
	     		dump($tsv2);
	     		echo "-----";
	     	}
	     }
		echo "<hr/>";
		echo "<hr/>";
		echo "<hr/>";
		echo "<hr/>";

		 dump($newres);
//-------------------------
	}

}
