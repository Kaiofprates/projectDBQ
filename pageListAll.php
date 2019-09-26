<?php  
 /*$connect = mysqli_connect("localhost", "root", "", "testing");  
 $query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);*/

$connect = mysqli_connect("localhost", "root", "", "db_genexam");  
 $query = "SELECT a.aAlternativesText,a.idAlternative,q.qQuestionText,q.qDiscipline,q.idQuestion
          FROM tb_questions AS q
          LEFT JOIN tb_alternatives AS a
          ON q.idQuestion = a.idAlternative
          ORDER BY idQuestion DESC";
          mysqli_set_charset($connect,"utf8");   
 $result = mysqli_query($connect, $query); 

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Banco de Questões</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <meta charset="utf8"> 
      </head>  
      <body>  
           <div class="container">  
                <div class="table-responsive">   
                     <div id="employee_table">  
                          <table class="table table-bordered table-striped">  
                               <tr>  
                                    <th width="70%">Questões</th>  
                                    <th width="15%">Alternativas</th>
                                    <th width="15%">Disciplina</th>  
                                    <!--<th width="15%">Opções</th>-->  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <!--página principal-->
                                    <td><?php echo $row["qQuestionText"]; ?></td> 
                                    <td><?php echo $row["aAlternativesText"]; ?></td>
                                    <td>
                                      <!--insignia do tipo de disciplina adicionada-->
                                      <span class="badge badge-píll badge-secondary"><?php echo $row["qDiscipline"]; ?>
                                    </span>
                                  </td>   
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>