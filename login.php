<?php 
// inclui o arquivo de inicialização
require 'init.php';
// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
if (empty($email) || empty($password))
{
	include 'form-login.php';
    echo "<p align='center' style='position:relative;top:-180px;'>Informe email e senha</p>";
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
    exit;
}
// pega o primeiro usuário
$user = $users[0];
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_level'] = $user['level'];
header('Location: index.php');
?>

