<?php

class index
{
	
	public function __construct()
	{
		if(isset($_SESSION['login'])){
			echo "Hello ". $_SESSION['login'];
		}else{
			echo "Hello there";
		}
	}
	
}