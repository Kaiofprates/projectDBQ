<?php  
session_start();
require_once 'init.php';
require_once 'check.php';
?>
<!doctype html>
<html>
    <head>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <meta charset="utf-8">
        <title>Painel | BDQ 1.6.5</title>
    </head>
    <body>

        <?php if($_SESSION['user_level'] == 1){ ?>   
          <?php include 'html/dashboardAdmin.php'; ?>
        <?php } ?>


        <?php if($_SESSION['user_level'] == 2){ ?>   
             <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="panel.php">Painel do Usuário</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active">                        
                            <p style="margin-bottom: 15px; margin-top:15px;">Bem-vindo ao seu painel, <?php echo $_SESSION['user_name'];?>. <button><a href="index.php">Questões</a></button> | <button><a href="logout.php">Sair</a></button></p>
                    </li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>
            <body></body>
        <?php } ?>
    </body>
</html>