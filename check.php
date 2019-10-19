<?php  
require_once 'init.php';
if(!isset ($_SESSION['login']) == true)
{
}else
	session_destroy();
  header('location:index.php');
?>