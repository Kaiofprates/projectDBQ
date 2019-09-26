
  <?php  
 //$connect = mysqli_connect("localhost", "root", "", "testing");
   $connect = mysqli_connect("localhost", "root", "", "db_genexam");
   mysqli_set_charset($connect,"utf8");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $qQuestionText = mysqli_real_escape_string($connect, $_POST["qQuestionText"]);  
      $aAlternativesText = mysqli_real_escape_string($connect, $_POST["aAlternativesText"]);     
      if($_POST["employee_id"] != '')  
      {  
           /*$query = "  
           UPDATE tbl_employee   
           SET name='$name',   
           address='$address'   
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Data Updated';*/

           $query = "UPDATE tb_questions, tb_alternatives
                    SET tb_questions.qQuestionText = '$qQuestionText',
                        tb_alternatives.aAlternativesText = '$aAlternativesText'
                    WHERE tb_questions.idQuestion = tb_alternatives.idAlternative
                    AND tb_questions.idQuestion = '".$_POST["employee_id"]."'"; 
      } 
      else  
      {  
           /*$query = "  
           INSERT INTO tbl_employee(name, address)  
           VALUES('$name', '$address');  
           "; */ 
           //$message = 'Data Inserted';

           $query = "INSERT INTO tb_questions(qQuestionText)
                    VALUES('$qQuestionText')";

           var_dump($query);  
      } 
      if(mysqli_query($connect, $query))  
      {  
           //$output .= '<label class="text-success">' . $message . '</label>';  
           /*$select_query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);*/

           $select_query = "SELECT a.aAlternativesText,a.idAlternative,q.qQuestionText,q.qDiscipline,q.idQuestion
                    FROM tb_questions AS q
                    LEFT JOIN tb_alternatives AS a
                    ON q.idQuestion = a.idAlternative
                    ORDER BY idQuestion DESC";
                    mysqli_set_charset($connect,"utf8");   
           $result = mysqli_query($connect, $select_query); 

           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Questões</th>  
                          <th width="15%">Alternativas</th>  
                          <th width="15%">Opções</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["qQuestionText"] . '</td>
                          <td>' . $row["aAlternativesText"] . '</td>  
                          <td> 

                          <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalADCA"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

                          <button type="button" name="edit" value="Edit" id="'.$row["idQuestion"].'" class="btn btn-info btn-xs edit_data" ><span class="glyphicon glyphicon-edit"></span></button>
 
                          <button type="button" name="view" value="view" id="'.$row["idQuestion"].'" class="btn btn-info btn-xs view_data"><span class="glyphicon glyphicon-list-alt"></span></button>

                          <a href="delete.php?idQuestion=<?php echo '.$row["idQuestion"].' ?><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a>

                          <span class="badge badge-pill badge-secondary"><?php '.$row["qDiscipline"].'?></span>
                        </td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;
      $window.location.reload();
 }  
 ?>
 