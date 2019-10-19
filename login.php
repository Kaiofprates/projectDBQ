<?php
$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 
// inclui o arquivo de inicialização
require 'init.php';
// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if (empty($email) || empty($password))
{
	include 'form-login.php';
	echo "<p align='center' style='position:relative;top:-180px;'>Informe email e senha</p>";
	$ipIp = $_SERVER['REMOTE_ADDR'];
	$ipIpDate = date("d/m/Y H:i:s");

	$ipIpMsg = "Tentativa de acesso";

	$sql = "INSERT INTO logs(`idIp`, `ipIp`, `ipIpDate`, ipIpMsg) VALUES(NULL,'$ipIp','$ipIpDate','$ipIpMsg')";
	mysqli_set_charset($connect,"utf8");   
	mysqli_query($connect, $sql);
	exit;
}
// cria o hash da senha
$passwordHash = make_hash($password);
$PDO = db_connect();
$sql = "SELECT * FROM tb_users WHERE email = :email AND password = :password";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $passwordHash);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($users) <= 0)
{
	include 'form-login.php';
	echo "<p align='center' style='position:relative;top:-180px;'>Email ou senha incorretos</p>";
	$ipIp = $_SERVER['REMOTE_ADDR'];
	$ipIpDate = date("d/m/Y H:i:s");

	$ipIpMsg = "Tentativa de acesso";

	$sql = "INSERT INTO logs(`idIp`, `ipIp`, `ipIpDate`, ipIpMsg) VALUES(NULL,'$ipIp','$ipIpDate','$ipIpMsg')";
	mysqli_set_charset($connect,"utf8");   
	mysqli_query($connect, $sql);
	exit;
}
// pega o primeiro usuário
$user = $users[0];
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_level'] = $user['level'];
$ipIp = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("America/Sao_Paulo");
$ipIpDate = date("d/m/Y h:i:s");

$ipIpMsg = "Acesso do usuario ".$_SESSION['user_name'];
$ipUserName = $_SESSION['user_name'];

$sql = "INSERT INTO `logs`(`idIp`, `ipIp`, `ipIpDate`, `ipIpMsg`, `ipUserName`) VALUES (NULL,'$ipIp','$ipIpDate','$ipIpMsg','$ipUserName')";
mysqli_set_charset($connect,"utf8");   
mysqli_query($connect, $sql);
header('Location: index.php');
exit;
?>

