<?php
/**
 * @Author: Marte
 * @Date:   2017-05-17 12:00:23
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-24 20:52:26
 */
namespace app\index\model;
use think\Model;
use think\Db;

class User extends Model
{
    // 查询数据库用户登录注册表手机号注册信息
    public function selectMobile($username)
    {
        $data = Db::name('user')->where('tel',$username)->field('id,password,tel')->select();
        return $data;
    }

    // 查询数据库用户登录注册表邮箱注册信息
    public function selectEmail($username)
    {
        $data = Db::name('user')->where('email',$username)->field('id,password,tel')->select();
        return $data;
    }

    //将用户注册信息插入数据库
    public function insertInto($data)
    {
        return Db::name('user')->insert($data);
    }

    // 查询数据库用户详情表手机号信息
    public function usersMobile($username)
    {
        $msg = Db::name('users')->where('tel',$username)->field('id,username,nickname,tel')->select();
        return $msg;
    }

    // 查询数据库用户详情表邮箱信息
    public function usersEmail($username)
    {
        $msg = Db::name('users')->where('email',$username)->field('id,username,nickname,tel')->select();
        return $msg;
    }
}