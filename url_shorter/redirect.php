<?php
	require_once 'class/shortener.php';

	if(isset($_GET['code'])){
		$s = new Shortener;
		$code = $_GET['code'];

		if($url = $s->getUrl($code)){
			header("Location: {$url}");
			die();
		}
	}
	header('Location: goo.d_url_shorter.php')
