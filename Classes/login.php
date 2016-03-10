<?php

class login
{
	public function __construct()
	{
		require "Database.php";
		require "view/login.html";
		$db = new Database(); 
	}

	
	public function details()
	{
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$login = "select * from user_reg where user = '".$user."' and pass = '".$pass."' ";
		if(is_bool(mysql_query($login))){
			while($row[] = mysql_fetch_assoc($login)){
			$detail = $row;
			}
			$detail[0]['user'] = $_SESSION['user'];
		}else{
			echo "Uh oh something goes wrong!";
			return false;
		}
	}
	
}