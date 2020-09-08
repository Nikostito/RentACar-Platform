<?php

	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_pass = '';
	$mysql_db = 'new_car_system1fixed';

	$mysql_connection = mysqli_connect($mysql_host,$mysql_user,$mysql_pass);

	if(!$mysql_connection || !mysqli_select_db($mysql_connection,$mysql_db))
	{
		die("Could not connect to database");
	}
?>