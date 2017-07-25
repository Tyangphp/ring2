<?php
namespace extend\mycurl;
class MyCurl
{
    public static function get($url)
    {
        //创建curl资源
        $ch = curl_init() ;

        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//设置是否返回数据
        curl_setopt($ch,CURLOPT_HEADER,false);//是否显示请求头
        curl_setopt($ch,CURLOPT_TIMEOUT,10);//设置超时时间，秒
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//是否启用ssl验证
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//是否验证主机

        //发起请求
        $content = curl_exec($ch);

        //关闭
        curl_close($ch);

        return $content;
    }

    public static function post($url,$data)
    {
        //创建curl资源
        $ch = curl_init() ;

        //设置参数
        curl_setopt($ch,CURLOPT_URL,$url);//设置请求地址
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//设置是否返回数据
        curl_setopt($ch,CURLOPT_HEADER,false);//是否显示请求头
        curl_setopt($ch,CURLOPT_TIMEOUT,10);//设置超时时间，秒
        curl_setopt($ch,CURLOPT_POST,true);//设置post请求
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//设置post请求参数
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//是否启用ssl验证
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);//是否验证主机

        //发起请求
        $content = curl_exec($ch);

        //关闭
        curl_close($ch);
        return $content;
    }
}