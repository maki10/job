<?php

class App
{
	
	public function __construct()
	{
		error_reporting(E_ALL & ~E_NOTICE ^ E_DEPRECATED);
		session_start();ob_start();
		$url = $_GET['url'];
		if(empty($url)){
			$url = 'index';
		}
		$url = rtrim($url, '/');
		$url = explode('/',$url);
		$url[0] = strtolower($url[0]);
		
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"view/style.css\">";
		require "view/navigation.html";
		
		$file = 'Classes/' . $url[0] . '.php';
		if(file_exists($file)){
			require $file;
		}else{
			require "Classes/error.php";
			$err = new error();
			return false;
		}
		
		$cont = new $url[0];
		if(isset($url[2])){
			$cont->{$url[1]}($url[2]);
		}else{
			if(isset($url[1])){
				$cont->{$url[1]}();
			}
		}
	}
	
}