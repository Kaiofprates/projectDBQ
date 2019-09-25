<?php
   //echo "teste";
 if(isset($_POST["employee_id"]))  
 {

      $output = ''; 
       
      /*$connect = mysqli_connect("localhost", "root", "", "testing");  
      $query = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);*/

      $connect = mysqli_connect("localhost", "root", "", "db_genexam");  
      $query = "SELECT a.aAlternativesText,a.idAlternative,q.qQuestionText,q.qDiscipline,q.idQuestion
              FROM tb_questions AS q
              LEFT JOIN tb_alternatives AS a
              ON q.idQuestion = a.idAlternative
              WHERE idQuestion = '".$_POST["employee_id"]."' ";
              mysqli_set_charset($connect,"utf8");   
      $result = mysqli_query($connect, $query); 

      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="70%">'.$row["qQuestionText"].' <br ><br >
                     '.$row["aAlternativesText"].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
