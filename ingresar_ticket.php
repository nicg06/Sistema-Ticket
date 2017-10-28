<?php require_once("class/class.php");

if (isset($_SESSION["session_tickets"])) {

$nomses='';
$tra=new trabajo();

$nom=$tra->get_datos_usuario($_SESSION["session_tickets"]);
$nomses=$nom[0]['NOMBRES'].' '.$nom[0]['APELLIDOS'];
$coduser=$nom[0]['COD_USUARIO'];

//cerrar sesion cuando este vencida
$fecahInicio=$_SESSION["ultima_conexion"];
  $ahora=date("Y-n-j H:i:s");   
  $duracion = (strtotime($ahora)-strtotime($fecahInicio));

  if ($duracion >=300) {
    session_destroy();
    header("Location: login.php");
  }else{

    $_SESSION["ultima_conexion"]=$ahora;
  }


require_once("template/header.php") ;



?>
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
             <?php require_once("template/menu.php") ?>
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  
                 
                  
                  
              </div>
              <!--state overview end-->

              <div class="row">
                  

                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading"><font><font>
                             Ingreso de Ticket
                          </font></font></header>
                          <div class="panel-body">
                              <form class="form-horizontal" name="formprod" id="formprod" action="inter_accion.php" method="post" >
                                  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Titulo de Incidencia</font></font></label>
                                      <div class="col-sm-10">
                                          <input type="text" name="tipo_inci" id="tipo_inci" class="form-control" required></input>
                                             
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Departamento</font></font></label>
                                      <div class="col-sm-10">
                                          <select name="depto" id="depto" class="form-control m-bot15" required>
                                              <option value=""><font><font>Elegir...</font></font></option>
                                              <option value="1"><font><font>Depto 1</font></font></option>
                                              <option value="2"><font><font>Depto 2</font></font></option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Prioridad de Incidencia</font></font></label>
                                      <div class="col-sm-10">
                                        <select name="prioridad" id="prioridad" class="form-control m-bot15" required>
                                              <option value=""><font><font>Elegir...</font></font></option>
                                              <option value="1"><font><font>Alta</font></font></option>
                                              <option value="2"><font><font>Normal</font></font></option>
                                              <option value="3"><font><font>Baja</font></font></option>
                                          </select>
                                      </div>
                                  </div>
                                
                                  
                                  <div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Descripción</font></font></label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" id="descrp" name="descrp" required></textarea>
                                          
                                      </div>
                                  </div><div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Comentario</font></font></label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" id="coment" name="coment" required></textarea>
                                          <input type="hidden" id="flagprod" name="flagprod" value="10"></input>
                                          
                                      </div>
                                  </div>
                                  
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font></font></font></label>
                                      <div class="col-sm-10">
                                         <button type="submit" class="btn btn-success">Guardar Ticket</button>
                                          <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>

                                      </div>
                                  </div>
                                  
                                  
                              </form>
                          </div>
                      </section>
                     
                     
                    
                                     
                      

                     

                  </div>




                  <div class="col-lg-4">
                      <!--new earning start-->
                      
                      <!--new earning end-->

                      <!--total earning start-->
                     
                      <!--total earning end-->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-4">

                      <!--user info table end-->
                  </div>

                      <!--weather statement end-->
                  </div>
              </div>

          </section>
      </section>


      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 &copy; Programción 4-Virtual-01
          </div>
      </footer>
      <!--footer end-->
  </section>

      <!-- js placed at the end of the document so the pages load faster -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
      <script src="js/jquery.scrollTo.min.js"></script>
      <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
      <script src="js/jquery.sparkline.js" type="text/javascript"></script>
      
      
      <script src="js/jquery.customSelect.min.js" ></script>
      <script src="js/respond.min.js" ></script>

          <!--right slidebar-->
          <script src="js/slidebars.min.js"></script>

          <!--common script for all pages-->
          <script src="js/common-scripts.js"></script>

          <!--script for this page-->
         
          <script src="js/count.js"></script>
           <script src="js/advanced-form-components.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

<?php
}else
{
  echo "
  <script type='text/javascript'>
  alert('Debe loguearse primero para acceder a este contenido');
  window.location='login.php';
  </script>
  ";
}
?>