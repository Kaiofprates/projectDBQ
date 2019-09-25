<?php 
$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 

	$idQuestion = $_GET['idQuestion'];
	$query = "DELETE FROM tb_questions  
			  WHERE idQuestion = $idQuestion";

	if(mysqli_query($connect, $query))
	{
		mysqli_close($connect);
		header('Location: index.php');
		exit;
	}else
	{
		echo "Erro ao deletar.";
		//var_dump($sql);
	}

?>