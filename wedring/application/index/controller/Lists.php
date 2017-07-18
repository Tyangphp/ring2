<?php
/**
 * @Author: Marte
 * @Date:   2017-07-11 19:34:39
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-11 20:43:54
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\User as UserModel;
use think\Db;

class Lists extends Controller
{
    public function lists()
    {
        return $this->fetch();
    }

    public function help()
    {
        return $this->fetch();
    }
}