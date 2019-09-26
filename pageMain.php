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
</head>  
<body>  
 <br /><br />  
 <div class="container">  
  <!--<h3 align="center">Banco de Questões</h3>-->  
  <br />  
  <div class="table-responsive">   
   <div id="employee_table">  
    <table class="table table-bordered table-striped">  
     <tr>  
      <th width="70%">Questões</th>  
      <th width="15%">Alternativas</th>  
      <th width="15%">Opções</th>  
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
        <!--botão para adicionar alternativas-->
        <button type="button" class="btn btn-info btn-xs" data-toggle='modal' data-target='#myModalADCA' style="padding: 8px 8px;font-size: 15px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
        <!--usando ajax nos botões editar e visualizar-->
        <!--botão para editar questão e alternativas-->
        <button type="button" name="edit" value="Edit" id="<?php echo $row["idQuestion"]; ?>" class="btn btn-info btn-xs edit_data" style="padding: 8px 8px;font-size: 15px;"><span class="glyphicon glyphicon-edit"></span></button>
        <!--botão para visualizar questão e alternativas-->  
        <button type="button" name="view" value="view" id="<?php echo $row["idQuestion"]; ?>" class="btn btn-info btn-xs view_data" style="padding: 8px 8px;font-size: 15px;"><span class="glyphicon glyphicon-list-alt"></span></button>
        <!--botão para deletar questão e alternativas pelo id com segurança-->
        <a href="delete.php?idQuestion=<?php echo $row["idQuestion"]; ?>"><button type="button" class="btn btn-info btn-xs" style="padding: 8px 8px;font-size: 15px;"><span class="glyphicon glyphicon-trash"></span></button></a>
        <!--insignia do tipo de disciplina adicionada-->
        <span class="badge badge-pill badge-secondary"><?php echo $row["qDiscipline"]; ?></span>
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
<!--modal de adicionar questão-->
<div id="myModalADCQ" class="modal fade">  
  <div class="modal-dialog modal-lg">  
   <div class="modal-content">  
    <div class="modal-header">  
     <button type="button" class="close" data-dismiss="modal">&times;</button>  
     <h4 class="modal-title">Menu Adicionar Questão</h4>  
   </div>  
   <div class="modal-body">
    <form action="questions.php" method="POST">
      <textarea name="qQuestion" class="form-control" rows="10"></textarea>    
      <div class="col-sm border bg-light">
        <div class="form-group">
          <label for="exampleFormControlSelect1">GRAU</label>
          <select class="form-control form-control-sm" name="qLevel">
            <option value="">--</option>
            <option value="Fácil">Fácil</option>
            <option value="Médio">Médio</option>      
            <option value="Difícil">Difícil</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">DISCIPLINA</label>
          <select class="form-control form-control-sm" id="" name="qDiscipline">
            <option value="">--</option>
            <option value="Português">Português</option>
            <option value="Matemática">Matemática</option>
            <option value="Física">Física</option>
            <option value="Química">Química</option>
            <option value="Literatura">Literatura</option>
            <option value="Geografia">Geografia</option>
            <option value="História">História</option>
            <option value="Artes">Artes</option>
            <option value="Inglês">Inglês</option>
            <option value="Espanhol">Espanhol</option>
            <option value="Redação">Redação</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">HABILIDADE</label>
          <select class="form-control form-control-sm" id="" name="qSkill">
            <option value="">--</option>
            <option value="Ciências Humanas e suas tecnologias">Ciências Humanas e suas tecnologias</option>
            <option value="Ciências da Natureza e suas tecnologias">Ciências da Natureza e suas tecnologias</option>
            <option value="Matemática e suas tecnologias">Matemática e suas tecnologias</option>
            <option value="Linguagens, códigos e suas tecnologias">Linguagens, códigos e suas tecnologias</option>
            <option value="Competências exigidas na Redação">Competências exigidas na Redação</option>
          </select>
        </div>
      </div>
      <br >
      <input type="submit" value="Salvar" class="btn btn-success" />  
    </form>  
  </div>
  <div class="modal-footer">  
   <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>  
 </div>  
</div>  
</div>  
</div>
<!--modal de adicionar alternativas-->
<div id="myModalADCA" class="modal fade">  
  <div class="modal-dialog modal-lg">  
   <div class="modal-content">  
    <div class="modal-header">  
     <button type="button" class="close" data-dismiss="modal">&times;</button>  
     <h4 class="modal-title">Menu Adicionar Alternativas</h4>  
   </div>  
   <div class="modal-body">
    <form action="alternatives.php" method="POST">
      <textarea name="aAlternatives" class="form-control" rows="10"></textarea> 
      <br >
      <input type="submit" value="Salvar" class="btn btn-success" />  
    </form>  
  </div>  
  <div class="modal-footer">  
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
 </div>  
</div>  
</div>  
</div>
<!--modal de visualizar questão e alternativas-->
<div id="dataModal" class="modal fade">  
  <div class="modal-dialog modal-lg">  
   <div class="modal-content">  
    <div class="modal-header">  
     <button type="button" class="close" data-dismiss="modal">&times;</button>  
     <h4 class="modal-title">Visualizar Questão\Alternativas</h4>  
   </div>  
   <div class="modal-body" id="employee_detail">  
   </div>  
   <div class="modal-footer">  
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
   </div>  
 </div>  
</div>  
</div>
<!--modal de editar questão e alternativas-->  
<div id="add_data_Modal" class="modal fade">  
  <div class="modal-dialog modal-lg">  
   <div class="modal-content">  
    <div class="modal-header">  
     <button type="button" class="close" data-dismiss="modal">&times;</button>  
     <h4 class="modal-title">Menu Editar</h4>  
   </div>  
   <div class="modal-body">  
     <form method="post" id="insert_form">  
      <label>Questão</label>  
      <textarea type="text" name="qQuestionText" id="qQuestionText" class="form-control" rows="10"></textarea>
      <br />  
      <label>Alternativas</label>  
      <textarea name="aAlternativesText" id="aAlternativesText" class="form-control" rows="10"></textarea>  
      <br />   
      <input type="hidden" name="employee_id" id="employee_id" />  
      <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
    </form>  
  </div>  
  <div class="modal-footer">  
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
 </div>  
</div>  
</div>  
</div>

<!--ajax para adicionar questão e alternativas #não utilizar-->  
<script>  
 $(document).ready(function(){  
  $('#add').click(function(){  
   $('#insert').val("Insert");  
   $('#insert_form')[0].reset();  
 });
      //ajax para editar questão e alternativas  
      $(document).on('click', '.edit_data', function(){  
       var employee_id = $(this).attr("id");  
       $.ajax({  
        url:"fetch.php",  
        method:"POST",  
        data:{employee_id:employee_id},  
        dataType:"json",  
        success:function(data){  
                     /*$('#name').val(data.name);  
                     $('#address').val(data.address);  
                     $('#gender').val(data.gender);  
                     $('#designation').val(data.designation);  
                     $('#age').val(data.age);  
                     $('#employee_id').val(data.id);*/

                     $('#qQuestionText').val(data.qQuestionText);
                     $('#aAlternativesText').val(data.aAlternativesText);
                     $('#employee_id').val(data.idQuestion); 
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                   }  
                 });  
     });
      //ajax para adicionar uma questão e alternativas #não utilizar  
      $('#insert_form').on("submit", function(event){  
       event.preventDefault();  
       if($('#qQuestionText').val() == "")  
       {  
        alert("qQuestionText is required");  
      }  
      else if($('#aAlternativesText').val() == '')  
      {  
        alert("aAlternativesText is required");  
      }  
      
      else  
      {  
        $.ajax({  
         url:"insert.php",  
         method:"POST",  
         data:$('#insert_form').serialize(),  
         beforeSend:function(){  
          $('#insert').val("Inserting");  
        },  
        success:function(data){  
          $('#insert_form')[0].reset();  
          $('#add_data_Modal').modal('hide');  
          $('#employee_table').html(data);  
        }  
      });  
      }  
    });
      //ajax que que mostra questão e alternativas pelo id  
      $(document).on('click', '.view_data', function(){  
       var employee_id = $(this).attr("id");  
       if(employee_id != '')  
       {  
        $.ajax({  
         url:"select.php",  
         method:"POST",  
         data:{employee_id:employee_id},  
         success:function(data){  
          $('#employee_detail').html(data);  
          $('#dataModal').modal('show');  
        }  
      });  
      }            
    });  
    });  
  </script>
  