<?php
/**
 * @Author: Marte
 * @Date:   2017-05-16 19:37:35
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-19 22:16:21
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
use think\Db;

class User extends Controller
{
    //登录
    public function login()
    {
        return $this->fetch();
    }

    //登录处理
    public function checkLogin()
    {
        // dump(input());
        //获取表单数据
        $input = input();
        $username = $input['data']['email'];
        $password = $input['data']['password'];
        // dump($username);
        // die;

        //查询数据库用户表
        $data = Db::name('user')->where('email',$username)->field('id,password,email')->select();

        // 判断用户账号是否存在
        if (empty($data)) {
            echo 0;
            return;
        }

        //判断用户密码是否正确
        if (!empty($data)) {
            if (empty($password)) {
                return 2;
            }
            if ($data[0]['password'] != md5($password)) {
               return 4;
            }

            //把username、uid保存到Session
            // Session::set('username',$username);
            // Session::set('uid',$data[0]['uid']);
            // return 5;
        }
            //把username、uid保存到Session
            session('username',$username);
            session('uid',$data[0]['uid']);
           return 5;
    }

    //忘记密码
    public function forget()
    {
        return $this->fetch();
    }

    //退出登录
    public function logout()
    {
        //清除session
        session(null);
        $this->redirect('/index/index/index');
    }

    //注册
    public function reg()
    {
        return $this->fetch();
    }

    //注册处理
    public function sign()
    {
        //获取表单数据
        // dump($_POST);
        //dump(input());
        // // die;
        $email = input('email');
        $password1 = input('email_pwd');
        $code = input('email_code');
        // $session = \think\Session::get();

        //判断用户是否已存在
        $data = Db::name('user')->where('email',$email)->select();
        // echo $data;

        if (!empty($data)) {
            echo 0;
            die;
        }
        // } else {
        //     $dcode = input('email_code');
        //     // 判断验证码是否正确
        //     $captcha = new \think\captcha\Captcha();

        //     if (!$captcha->check($dcode)) {
        //         echo 2;
        //         return;
        //     }else {
        //         echo 3;
        //         return;
        //     }
        // }




        //把数据插入到的数据库
        $result = new UserModel();
        $result->data([
                'email' => $email,
                'password' => md5($password1)
            ]);
        $result->save();

        echo 3;
        // return;


        // if ($result) {
        //     $this->success('注册成功！','/index/index/index');
        // } else {
        //     $this->error('注册失败！','/index/user/register');
        // }
    }

    public function person()
    {
        //获取Session值
        $username = session('username');

        //分配变量
        $this->assign('username',$username);
        return $this->fetch();
    }

    public function person_check()
    {
        //获取Session值
        $username = session('username');

        //查询数据库，获得$username的相关内容
        $data = User::where('username',$username)->select();

        //获取表单内容
        $password = md5(input('pwd2'));
        $pwd1 = input('pwd1');
        $pwd2 = input('pwd2');
        $pwd3 = input('pwd3');
        $email = input('email');
        $code = input('code');

        //判断是否输入密码
        if (empty($pwd1)) {
            return 0;
        }

        if (empty($pwd2)) {
            return 1;
        }

        //判断原密码是否正确
        if (md5($pwd1) != $data[0]['password']) {
            return 2;
        }

        //判断密码是否符合规则
        $num = strlen($pwd2);
        $pattren = "/[0-9]{" . $num . "}/";
        $pattren1 = "/\w{6,18}/";
        if (preg_match($pattren,$pwd2,$match)){
            //是否为纯数字
            return 3;
        } elseif (!preg_match($pattren1,$pwd2,$match)) {
            //密码长度是否是6-18位
            return 4;
        } else {
            //判断两次新密码输入是否相同
            if ($pwd2 != $pwd3) {
                return 5;
            }
        }

        if(!captcha_check($code)){
            return 6;
        };

        //更新数据库信息
        User::where('username',$username)->update(['password'=>$password]);
        return 7;
    }

    public function notice()
    {
        return $this->fetch();
    }
}