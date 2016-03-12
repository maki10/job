<?php

class login
{
	public function __construct()
	{
		require_once "Database.php";
		require "view/login.html";
		$db = new Database(); 
	}

	
	public function details($user = false, $pass = false)
	{
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$login = mysql_query("select * from user_reg where user = '".$user."' and pass = '".$pass."' ");
		if(mysql_num_rows($login)>=1){
			while($row[] = mysql_fetch_assoc($login)){
				$log = $row;
			}
		$_SESSION['login'] = $log[0]['user'];
		$_SESSION['id']    = $log[0]['id'];
		header("Location: ../index");
		}
	}
	
}
