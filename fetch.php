
  <?php  
 //fetch.php  
 //$connect = mysqli_connect("localhost", "root", "", "testing");
	
 $connect = mysqli_connect("localhost", "root", "", "db_genexam");    

 if(isset($_POST["employee_id"]))   
 {  
      /*$query = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);*/

      $query = "SELECT a.aAlternativesText,a.idAlternative,q.qQuestionText,q.qDiscipline,q.idQuestion
                FROM tb_questions AS q
                LEFT JOIN tb_alternatives AS a
                ON q.idQuestion = a.idAlternative
                WHERE q.idQuestion = '".$_POST["employee_id"]."' ";
                mysqli_set_charset($connect,"utf8"); 
      $result = mysqli_query($connect, $query); 
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 