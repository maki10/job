<?php

class logout
{
	public function __construct()
	{
		unset($_SESSION['login']);
		unset($_SESSION['id']);
		session_destroy();
		header("Location: index");
	}
}