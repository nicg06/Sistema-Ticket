<?php
require_once("class/class.php");

if (isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
  //print_r($_POST);
  $t=new Trabajo();
  $t->logueo();
  exit;
  
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Nov 2014 23:26:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Sistema de Tickets</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Formulario de Inicio de Sesion</h2>
        <div class="login-wrap">
            <input type="text" name="user" class="form-control" placeholder="Usuario" autofocus required>
            <input type="password" name="pass" class="form-control" placeholder="Password" required>
            <label class="checkbox">
              <!--   <input type="checkbox" value="remember-me"> Remember me -->
                <span class="pull-right">
                    <!-- <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
 -->
                </span>
            </label>
            <input type="hidden" name="grabar" value="si" />
            <button class="btn btn-lg btn-login btn-block" type="submit">Entrar</button>
            <!-- <p>or you can sign in via social network</p> -->
            <div class="login-social-link">
               
            </div>
            <div class="registration">
                No tienes usuario?
                <a class="" href="#">
                    Contacta al Administrador
                </a>
            </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Nov 2014 23:26:51 GMT -->
</html>
