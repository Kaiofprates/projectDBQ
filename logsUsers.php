<?php
$connect = mysqli_connect("localhost", "root", "", "db_genexam"); 
$sql = "SELECT * FROM tb_users";
mysqli_set_charset($connect,"utf8");   
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table {
			width: 100%;
			text-align: left;
			table-layout: fixed;
		}

		th, td {
			word-wrap: break-word;
			width: 100%;
		}

		@media screen and (max-width: 750px) {
			tbody, thead { float: left; }
			thead { min-width: 120px }
			td,th { display: block }
		}
	</style> 
	<title>DBQ 1.6.7</title>
</head>
<body>
	<table>
		<tr>
			<td>Nome</td>
			<td>Email</td>
			<td>Nível de acesso</td>
		</tr>
		<?php 
		while($row = mysqli_fetch_array($result))  
		{
			?>
			<tr>
				<td><?php echo $row ["name"]; ?></td>
				<td><?php echo $row ["email"]; ?></td>
				<td><?php echo $row ["level"]; ?></td>
			</tr>
			<?php 
		} 
		?>
	</table>
</body>
</html>