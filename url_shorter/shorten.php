<?php
session_start();
require_once 'class/shortener.php';

$s = new Shortener;

if(isset($_POST['url'])){
	 $url = $_POST['url'];
	 
	 if ($code = $s->makeCode($url)){
	 	
	 	$_SESSION['feedback'] = 'Your short url is :<a href =\"http://localhost/url_shorter/{$code}\">http://localhost/url_shorter/{$code}</a>';
	}	

		
	 else{
	 	//if have problems 
	 	$_SESSION['feedback'] = "There was a problem. Try another url.";
	 }
	 
	 //copy url to clipboard
	 
	 
}
header('Location: goo.d_url_shorter.php');



