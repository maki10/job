<?php

class list_all
{
	
	public function __construct()
	{
		require "Database.php";
		$db = new Database(); 
		$query = mysql_query("SELECT * FROM user_reg ORDER BY user_reg.date_reg ASC");
		while($row[] = mysql_fetch_assoc($query)){
			$user = $row;
		}
		require "view/list.html";
	}
	
}