<?php
/**
 * @Author: Marte
 * @Date:   2017-05-17 12:00:23
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-20 10:50:33
 */
namespace app\index\model;
use think\Model;
use think\Db;

class User extends Model
{
    // 查询数据库用户登录注册表
    public function slec($username)
    {
        $username = '767056186@qq.com';
        $data = Db::name('user')->where('email',$username)->field('id,password,email')->select();
    }
}