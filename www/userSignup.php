<?php
$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$level = $_POST['level'];
$discipline = $_POST['discipline'];
$password = $_POST['password'];
$password = sha1(md5($password));
$queryCall = "CALL insertUsers ('$name','$lastName','$gender','$telephone','$email','$password','$level','$discipline')";
mysqli_set_charset($connect, "utf8");
$result = mysqli_query($connect, $queryCall);
header('Location: panelAdmin.php');	
?>