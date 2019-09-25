<?php
$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 

	/*$sql = "SELECT q.idQuestion FROM qQuestionText AS q";
	$idQuestion_FK = mysqli_query($conn,$sql);*/

	$aAlternatives = $_POST['aAlternatives'];
	//$aAnswerText = $_POST['aAnswerText'];

	$query = "INSERT INTO `tb_alternatives` (`idAlternative`, `aAlternativesText`) VALUES (NULL, '$aAlternatives')";
	mysqli_set_charset($connect, "utf8");
	//var_dump($sql);
	$result = mysqli_query($connect, $query);
	mysqli_query($connect,"ALTER TABLE `tb_alternatives` auto_increment = 1;");
	header('Location: index.php');
?>

