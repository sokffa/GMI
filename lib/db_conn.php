<?php 
	
require_once 'config.php';
		$connect = new mysqli($host,$user,$password,$db);
	if(mysqli_connect_errno()){
		die ("cannot connect to database");
	}



?>