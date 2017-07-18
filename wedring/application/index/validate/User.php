<?php
/**
 * @Author: Marte
 * @Date:   2017-07-12 14:57:14
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-12 15:02:25
 */
namespace app\index\model;
use think\Validate;

class User extends Validate
{
    protected $rule = [
    'username' => 'require|max:25',
    'password' => 'require|length:6,18',
    'email' => 'email',
    ];
    protected $message = [
    'username.require' => '名称必须',
    'username.max' => '名称最多不能超过25个字符',
    'password.require' => '密码必须',
    'password.between' => '密码只能在6-18位',
    'email' => '邮箱格式错误',
    ];
}