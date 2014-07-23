<?php 
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$db_name = "std";
	
	$con=mysql_connect($hostname, $username, $password);

	$selected = mysql_select_db($db_name);
  		mysql_query("SET NAMES UTF8");
 ?>