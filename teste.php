<?php
session_start();
require 'init.php';
?>
<html lang="ptbr">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>BDQ 1.6.6 | Painel Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        @media(min-width:768px) {
            body {
                margin-top: 50px;
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
            line-height: 20px;
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
        padding: 5px 15px;
    }    
</style>
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Top Menu Items -->
            <a class="navbar-brand" href="index.php">
                <img src="res/img/logo_padrao_horizontal_resize.jpg" alt="LOGO">
                <?php if (isLoggedIn()): ?>
                  <button type="button" name="add" id="add" data-toggle="modal" data-target="#myModalADCQ" class="btn btn-warning" style="margin-bottom: 10px; margin-top:10px;"><span class="glyphicon glyphicon-plus-sign"></span></button> 
              <?php endif; ?>
          </a>
          <ul class="nav navbar-right top-nav">

              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">                        
                     <?php if (isLoggedIn()): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <p style="margin-bottom: 15px; margin-top:15px;">Olá, <?php echo $_SESSION['user_name']; ?>.
                          <?php if($_SESSION['user_level'] == 1){ ?>  
                            <button><a href="panelAdmin.php">Painel</a></button>
                        <?php } ?>
                        <?php if($_SESSION['user_level'] == 2){ ?>
                            <button><a href="panelUser.php">Painel</a></button>
                        <?php } ?>   
                        | <button><a href="logout.php">Sair</a></button></p>
                        <?php else: ?>
                         <li>Olá, visitante. <a data-toggle='modal' data-target='#myLogin'>Login</a></li>
                     <?php endif; ?>
                 </li>
             </ul>
         </div><!--/.nav-collapse -->            
     </ul>      
 </nav>
</div><!-- /#wrapper -->    
</body>
</html>