<?php
	$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 
	$ipIp = $_SERVER['REMOTE_ADDR'];
	$ipIpDate = date("Y-m-d");

	$ipIpMsg = "teste de registro de acesso";
	
	$sql = "INSERT INTO logs(`idIp`, `ipIp`, `ipIpDate`, ipIpMsg) VALUES(NULL,'$ipIp','$ipIpDate','$ipIpMsg')";
	mysqli_set_charset($connect,"utf8");   
	mysqli_query($connect, $sql);
?>