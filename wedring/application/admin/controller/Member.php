<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\ModelM;
use think\Db;

class Member extends Base
{
	//会员展示	
    public function s_member()
    {
    	$scode = input('get.stime');
		if ($scode) {
			$usinfo =  model('MemberM')->ssusInfo(input('stime'),input('etime'));
			$page = $usinfo->render();
		    $this->assign('page',$page);
		    $this->assign('usinfo',$usinfo);
		}else{
			$usinfo =  model('MemberM')->userInfo();

			$page = $usinfo->render();
		    $this->assign('page',$page);
		    $this->assign('usinfo',$usinfo);
		   
		}
		
		return $this->fetch();
	}
	
	//意见箱页面
	public function s_reply()
	{
		$rpinfo =  model('MemberM')->replyInfo();

		$page = $rpinfo->render();
	    $this->assign('page',$page);
	    $this->assign('rpinfo',$rpinfo);
		return $this->fetch();
	}
	
	//回复留言
	public function add_reply()
	{
		$sem = input('email');
        $this->assign('sem',$sem);
		return $this->fetch();
	}
	//发送邮件
	public function sendEmail()
	{
			$email = $_POST['email'];
          	$toemail=$email;
            $name='yanggephp';
            $subject=$_POST['title'];
            $content=$_POST['content'];
            $send = send_mail($toemail,$name,$subject,$content);
           	if ($send) {
           		$this->success("发送成功",'admin/member/s_reply');
	        } else {
	            $this->error("邮件内容被网易当垃圾邮件了",'admin/member/s_reply');
	        }
	}
	//已读邮件
	public function ydreply()
	{
		$id = input('id');
        $ydhd = Db::name('suggest')->where('id',$id)->update(['is_rd'=>'1']); 
        if ($ydhd) {
             $this->redirect("admin/member/s_reply");
         } else {
             $this->error('已读失败', 'admin/member/s_reply');
         }
	}
	//删除用户
	public function delus()
	{
		$uid = input('uid');
		$dodel = model('MemberM')->delall($uid);
		if ($dodel) {
	            $this->success("删除成功",'admin/member/s_member');
	        } else {
	             $this->error("删除失败",'admin/member/s_member');
	        }
	}

	//禁止用户
	public function stop()
	{
		$uid = input('uid');
		$stopus = model('MemberM')->stopus($uid);
		$this->redirect("admin/member/s_member");
	}

	/**
	 * tp5 使用excel导出
	 * @param
	 * @author staitc7  * @return mixed
	 */
	public function excel() {
	   $name='会员列表';
	   $ssexcel = model('MemberM')->ssexcel();
	   $header=['用户名','联系电话','邮箱','注册时间'];
	   $data=[];
	   foreach ($ssexcel as $key => $value) {
	   			$data[] = [$value['username'],$value['tel'],$value['email'],$value['create_time']];
	  		 }
	  excelExport($name,$header,$data);
	}
}