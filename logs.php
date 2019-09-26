<?php 
 $connect = mysqli_connect("localhost", "root", "", "db_genexam"); ;
 $query = "SELECT * FROM logs";
 $result = mysqli_query($connect, $query); 
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
			<td>IP</td>
			<td>Usuário</td>
			<td>Mensagem</td>
			<td>Data</td>
		</tr>
		<?php 
		while($row = mysqli_fetch_array($result))  
		{
		?>
		<tr>
			<td><?php echo $row["ipIp"]; ?></td>
			<td><?php echo $_SESSION['user_name']; ?></td>
			<td><?php echo $row ["ipIpMsg"]; ?></td>
			<td><?php echo $row ["ipIpDate"]; ?></td>
		</tr>
		<?php 
		} 
		?>
	</table>
</body>
</html>