<?php
session_start();
require 'init.php';
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <meta charset="utf-8">
  <title>DBQ 1.6.7</title>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" style="color: #fff;margin-bottom: 0px;border-bottom-width: 0px;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="res/img/logo_padrao_horizontal_resize.jpg" alt="BANCO DE QUESTÕES"></a>
        <?php if (isLoggedIn()): ?>
          <button type="button" name="add" id="add" data-toggle="modal" data-target="#myModalADCQ" class="btn btn-warning" style="margin-bottom: 12px;margin-top: 12px;width: 30px;height: 30px;padding-left: 4px;padding-top: 4px;padding-right: 4px;padding-bottom: 4px;"><span class="glyphicon glyphicon-plus-sign"></span></button> 
        <?php endif; ?>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right" style="margin-left:5px;">
          <li class="active">                        
           <?php if (isLoggedIn()): ?>
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" >
                   <span class="glyphicon glyphicon-user"></span> 
                   <?php echo $_SESSION['user_name']; ?>
                    <b class="fa fa-angle-down"></b>
                  </a>
                <ul class="dropdown-menu"> 
                  <?php if($_SESSION['user_level'] == 1){ ?>  
                    <li><a href="panelAdmin.php"> <i class="fa fa-fw fa-cog"></i> Painel</a></li>
                  <?php } ?>
                    <?php if($_SESSION['user_level'] == 2){ ?>
                        <button><a href="panelUser.php">Painel</a></button>
                    <?php } ?> </a>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a></li>
              </li>
              <?php else: ?>
               <p style="margin-bottom: 20px; margin-top:15px;">Olá, visitante. <a data-toggle='modal' data-target='#myLogin'>Login</a>
               <?php endif; ?>
                </ul>
             </li>
           </ul>
         </div><!--/.nav-collapse -->
       </div>
     </nav>
     <?php if (isLoggedIn()): ?>
       <?php include 'pageMain.php';?>
       <?php else: ?>
        <p style="margin-bottom: 15px;margin-top:15px;height: 26px;">Olá, visitante. <a data-toggle='modal' data-target='#myLogin'>Login</a></p>
        <?php include 'pageListAll.php';?>
      <?php endif; ?> 

      <!--modal login-->
      <div id="myLogin" class="modal fade">  
        <div class="modal-dialog modal-sm">  
         <div class="modal-content">  
          <div class="modal-header">  
           <button type="button" class="close" data-dismiss="modal">&times;</button>  
           <h4 class="modal-title">Login</h4>  
         </div>  
         <div class="modal-body" align="center">
          <form action="login.php" method="post">
            <br>
            <input type="text" name="email" id="email" placeholder="Email">
            <br><br>
            <input type="password" name="password" id="password" placeholder="Senha">
            <br><br>
            <input type="submit" value="Entrar">
          </form>
        </div>  
      </div>  
    </div>  
  </div>
    <style type="text/css">
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        @media(min-width:768px) {
            body {
                margin-top: 0px;
            }
            /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
        }

        #wrapper {
            padding-left: 0;    
        }

        #page-wrapper {
            width: 100%;        
            padding: 0;
            background-color: #fff;
        }

        @media(min-width:768px) {
            #wrapper {
                padding-left: 225px;
            }

            #page-wrapper {
                padding: 22px 10px;
            }
        }

        /* Top Navigation */

        .top-nav {
            padding: 0 15px;
        }

        .top-nav>li {
            display: inline-block;
            float: left;
        }

        .top-nav>li>a {
            padding-top: 20px;
            padding-bottom: 20px;
            line-height: 26px;
            color: #fff;
        }

        .top-nav>li>a:hover,
        .top-nav>li>a:focus,
        .top-nav>.open>a,
        .top-nav>.open>a:hover,
        .top-nav>.open>a:focus {
            color: #fff;
            background-color: #1a242f;
        }

        .top-nav>.open>.dropdown-menu {
            float: left;
            position: absolute;
            margin-top: 0;
            /*border: 1px solid rgba(0,0,0,.15);*/
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            background-color: #fff;
            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
        }

        .top-nav>.open>.dropdown-menu>li>a {
            white-space: normal;
        }

        .navbar .nav > li > a > .label {
          -webkit-border-radius: 50%;
          -moz-border-radius: 50%;
          border-radius: 50%;
          position: absolute;
          top: 14px;
          right: 6px;
          font-size: 10px;
          font-weight: normal;
          min-width: 15px;
          min-height: 15px;
          line-height: 1.0em;
          text-align: center;
          padding: 2px;
      }

      .navbar .nav > li > a:hover > .label {
          top: 10px;
      }

      .navbar-brand {
        padding: 3px 15px;
    } 
  </style>
</body>
</html>

