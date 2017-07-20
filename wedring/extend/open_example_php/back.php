<?php
	include 'open51094.class.php';

	$open = new open51094();
	$code = $_GET['code'];
	var_dump( $open->me($code) );
?>