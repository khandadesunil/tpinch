<?php
    $hostname = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db = 'taskpinch';
	
	$connection = mysql_connect($hostname, $db_user, $db_pass) or die ("Could not connect to server ... \n" . mysql_error ());
	mysql_select_db($db) or die ("Could not connect to database ... \n" . mysql_error ());
?>