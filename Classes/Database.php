<?php

require "Static/Static.php";

/*
* MAJOR DEBAG
*/

class Database
{
	
	protected $_link, $_result, $_numRows;
	
	public function __construct()
	{
		$this->_link = mysql_connect(staticDB::$_server, staticDB::$_user, staticDB::$_pass);
		mysql_select_db(staticDB::$_database, $this->_link);
	}
	
	public function query($sql)
	{
		$this->_result = mysql_query($sql, $this->_link);
		$this->_numRows = mysql_num_rows($this->_result);
	}
	
	public function one_query($query)
	{
		return mysql_query($query);
	}
	
	public function number()
	{
		return $this->_numRows;
	}

	public function result()
	{
		$rows = array();
		for($i=0;$i<$this->_numRows;$i++){
			$rows[] = mysql_fetch_assoc($this->_result);
		}
		return $rows;
	}

	public function Disconect()
	{
		mysql_close($this->_link);
	}
	
}
