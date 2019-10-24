<?php  
	$name = $_SESSION['user_name'];
	$connect = mysqli_connect("localhost", "root", "", "db_genexam");
	$query = "SELECT * 
			  FROM tb_questions";
	$result = mysqli_query($connect,$query);
?>