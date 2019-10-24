<?php
$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 
$ipIp = $_SERVER['REMOTE_ADDR'];

echo $ipIp;
$ipIpDate = date("Y-m-d");


$sql = "INSERT INTO logs(`idIp`, `ipIp`, `ipIpDate`, ipIpMsg, ipUserName) VALUES(NULL,'$ipIp','$ipIpDate','$ipIpMsg','$ipUserName)";
mysqli_set_charset($connect,"utf8");   
mysqli_query($connect, $sql);
exit;
?>