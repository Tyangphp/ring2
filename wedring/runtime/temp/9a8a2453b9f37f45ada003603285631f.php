<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"C:\wamp64\www\1702\high\27\thinkphp5\public/../application/index\view\index\index.html";i:1494834163;s:81:"C:\wamp64\www\1702\high\27\thinkphp5\public/../application/index\view\layout.html";i:1494834161;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
	.header{height: 200px;background: red;}
	.footer{height: 100px;background: yellow;}
	</style>
	
</head>
<body>
	<div class='header'>
	<?php echo $content; ?>
	</div>
	
	{ $content}<br/>
	
	
	
	
	
	
	
	<?php echo \think\Request::instance()->get('page'); ?><br/>
	<?php echo APP_PATH; ?><br/>
	<?php echo (isset($pwd) && ($pwd !== '')?$pwd:'不告诉你密码'); ?>
	{$a+10}
	<?php if(!empty($b)) echo '我没定义'; ?>

	<div class='footer'></div>
</body>
</html>