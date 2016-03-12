<?php

class registration
{
	
	
	public function __construct()
	{
		require_once "Database.php";
		require "view/registration.html";
		$db = new Database(); 		
	}
	
	public function details()
	{
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$date = date("Y-m-d H:i:s");
		if(!empty($user) && !empty($pass)){
		$query = "INSERT INTO user_reg(user, pass,date_reg)VALUES('".$user."','".$pass."','".$date."')";
		if(is_bool(mysql_query($query))){
			require "login.php";
			$login = new login();
			$login->details($user,$pass);
		}else{
			mysql_error($query);
		}
		}else{
			echo "Your don't fill all inputs!";
		}
	}
}