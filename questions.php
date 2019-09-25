<?php
$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 
		
	$qQuestion = $_POST['qQuestion'];
	$qLevel = $_POST['qLevel'];
	$qDiscipline = $_POST['qDiscipline'];
	$qSkill = $_POST['qSkill'];

	$query = "INSERT INTO `tb_questions` (`idQuestion`, `qQuestionText`, `qLevel`, `qDiscipline`, `qSkill`) VALUES (NULL, '$qQuestion', '$qLevel','$qDiscipline', '$qSkill')";
	mysqli_set_charset($connect, "utf8");
	$result = mysqli_query($connect, $query);
	mysqli_query($connect,"ALTER TABLE `tb_questions` auto_increment = 1;");
	header('Location: index.php');	
?>