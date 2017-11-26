<?php 
require_once("class/class.php");



if (isset($_SESSION["session_tickets"])) {
  # 

$nomses='';
$tra=new trabajo();


$prt=$tra->traer_ticket_completos();


$pend=$tra->traer_ticket_pendietes();


$sinat=$tra->traer_ticket_noatendidos();

$todot=$tra->traer_tickets_all();


$datg=$tra->data_grafica();

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



require_once("template/header.php");


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
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-check-square"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  <?=$prt[0]['COMPLETOS']?>
                              </h1>
                              <p>Tickets Resueltos</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  <?=$pend[0]['PENDIENTES']?>
                              </h1>
                              <p>Tickets Pendientes</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-folder-open-o"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                                   <?=$sinat[0]['ABIERTOS']?>
                              </h1>
                              <p>Tickets Abiertos</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                                  
                                   <?=$todot[0]['TICKETS']?>
                              </h1>
                              <p>Total Tickets Creados</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-8">
                      <!--custom chart start-->
                     
                        <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>REPORTE DE TICKETS</h1>
                                  <p>Cantidad por usuario</p>
                              </div>
                              <div class="task-option">
                                 <span class="customSelect styled" style="display: inline-block;"><span class="customSelectInner" style="width: 92px; display: inline-block;">Tickets</span></span>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <?php foreach ($datg as $key ) { ?>
                

              <tr class="gradeX odd">
                  <td class=" "> <?=$key['NOMBRE_USUARIO']?> </td>
                  <td class=" "><?=$key['CANT']?></td>
                 
                 
                  
              </tr>
             <?php }
              ?>    
                              </tbody>
                          </table>
                      </section>
                     
                      <!--custom chart end-->
                  </div>
                  <div class="col-lg-4">
                      <!--new earning start-->
                      <div class="panel terques-chart">
                          <div class="panel-body chart-texture">
                              <div class="chart">
                                  <div class="heading">
                                      <span>Mes Mayor Atencion</span>
                                      <strong>Octubre</strong>
                                  </div>
                                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title">Rendimiento</span>
                          </div>
                      </div>
                      <!--new earning end-->

                      <!--total earning start-->
                      <div class="panel green-chart">
                          <div class="panel-body">
                              <div class="chart">
                                  <div class="heading">
                                      <span>Total de Tickets</span>
                                      <strong>10</strong>
                                  </div>
                                  <div id="barchart"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title"></span>
                              <span class="value"></span>
                          </div>
                      </div>
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
              2017 &copy; Diseño BD-Virtual-01
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
      <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
      <script src="js/owl.carousel.js" ></script>
      <script src="js/jquery.customSelect.min.js" ></script>
      <script src="js/respond.min.js" ></script>

          <!--right slidebar-->
          <script src="js/slidebars.min.js"></script>

          <!--common script for all pages-->
          <script src="js/common-scripts.js"></script>

          <!--script for this page-->
          <script src="js/sparkline-chart.js"></script>
          <script src="js/easy-pie-chart.js"></script>

          <!--<script src="js/count.js"></script>-->
           <script src="assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
    <script src="assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!-- script for this page only -->
    <!-- <script src="js/morris-script.js"></script>-->

  <script>

      //owl carousel
    //custom select box







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