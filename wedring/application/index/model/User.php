<?php
/**
 * @Author: Marte
 * @Date:   2017-05-17 12:00:23
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-20 17:58:58
 */
namespace app\index\model;
use think\Model;
use think\Db;

class User extends Model
{
    // 查询数据库用户登录注册表
    public function selected($username)
    {
        $data = Db::name('user')->where('tel',$username)->field('id,password,tel')->select();
        return $data;
    }
}