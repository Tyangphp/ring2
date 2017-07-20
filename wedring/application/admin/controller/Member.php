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
            // $subject='nihao';
            // $content='QQ';
            $send = send_mail($toemail,$name,$subject,$content);
           	if ($send) {
           		 $this->error("邮件内容被网易当垃圾邮件了",'admin/member/s_reply');
	        } else {
	            $this->success("发送成功",'admin/member/s_reply');
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
}