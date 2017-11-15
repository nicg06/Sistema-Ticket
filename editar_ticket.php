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


if ($_GET['idp'] !='') {
  # code...
  $prt=$tra->traer_ticket_id($_GET['idp'],$_GET['idst']);
}else{
  header("Location: tickets.php");
}

  //print_r($prt);
  //exit;

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
                             Ingresar Seguimiento al ticket
                          </font></font></header>
                          <div class="panel-body">
                              <form class="form-horizontal" name="formprod" id="formprod" action="inter_accion.php" method="post" >
                                  

                                <div class="panel-body" style="background-color: #e7e8e8;">
                                      <div class="row m-bot15">
                                          <div class="col-sm-6 ">
                                       <div class="form-group">
                                        <label class="col-sm-3 col-sm-3" style="text-align: right;"><font><font><b>Titulo Ticket:</b></font></font></label>
                                        <div class="col-sm-5" style="position: relative; padding: 2px 3px; border-bottom: 1px dashed #eaeaea;">  
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                           <?=$prt[0]['TITULO_TICKET']?></font></font></p>                                     
                                        </div>
                                      </div>
                                          </div>
                                          <div class="col-sm-6 \">
                                            <div class="form-group">
                                            <label class="col-sm-3 col-sm-3" style="text-align: right;"><font><font><b>Departamento:</b></font></font></label>
                                            <div class="col-sm-5" style="position: relative; padding: 2px 3px; border-bottom: 1px dashed #eaeaea;"> 
                                               <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                               <?=$prt[0]['NOMBRE']?></font></font></p>  
                                      </div>
                                  </div>
                                          </div>
                                      </div>
                                      <div class="row m-bot15">
                                          <div class="col-sm-6 ">
                                              <div class="form-group">
                                      <label class="col-sm-3 col-sm-3" style="text-align: right;"><font><font><b>Prioridad:</b></font></font></label>
                                      <div class="col-sm-5">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         
                                         <?php if($prt[0]['PRIORIDAD']==1 ){echo '<span class="badge badge-sm label-danger">ALTA</span>';} elseif ($prt[0]['PRIORIDAD']==2) {echo '<span class="badge badge-sm label-warning">NORMAL</span>';}else{echo '<span class="badge badge-sm label-primary">BAJA</span>';}?>
                                         </font></font></p>  
                                        </div>
                                  </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                      <label class="col-sm-3 col-sm-3" style="text-align: right;"><font><font><b>Fecha Ingreso:</b></font></font></label>
                                      <div class="col-sm-5">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['FECHA_ALTA']?></font></font></p> 
                                        
                                        </div>
                                  </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-sm-6 ">
                                              <div class="form-group">
                                      <label class="col-sm-3 col-sm-3" style="text-align: right;"><font><font><b>Usuario:</b></font></font></label>
                                      <div class="col-sm-5">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['USERNAME']?></font></font></p> 
                                        
                                        </div>
                                  </div>
                                          </div>
                                          <div class="col-sm-6 ">
                                              <div class="form-group">
                                      <label class="col-sm-3 col-sm-3" style="text-align: right;"><font><font><b>Estado:</b></font></font></label>
                                      <div class="col-sm-5">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                      
                                         <?php
                        if($prt[0]['ESTADO']=='CERRADO' ){echo '<span class="badge badge-sm label-inverse">CERRADO</span>';} elseif ($prt[0]['ESTADO']=='ABIERTO') {echo '<span class="badge badge-sm label-primary">ABIERTO</span>';}else{echo '<span class="badge badge-sm label-info">PENDIENTE</span>';} 

                        ?>

                                         </font></font></p> 
                                        
                                        </div>
                                  </div>
                                          </div>
                                      </div>
                                  </div><br>                                 
                                  
                                   
                                 
                                  
                                  <div>
                                  <div class="form-group ">
                                      
                                      <div class="col-sm-11">
                                      
                                         <section class="panel">
                                                <header class="panel-heading" style="background-color: #a76a73; color: #FFFFFF">
                                                     Descripción <span  style="float: right;">Fecha: </span>
                                                </header>
                                                <div class="panel-body"  style="background-color: #f7f7f7;">
                                                    <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['DESCRIPCION']?>   </font></font></p> 

                                                </div>
                                            </section>
                                        
                                      </div>
                                  </div>
                               
                                  <?php if($_GET['idst']=='PENDIENTE' OR  $_GET['idst']=='CERRADO') { 
                                    foreach ($prt as $key) {
                                      
                                    
                                 echo '<div class="form-group">
                                      
                                      <div class="col-sm-11" style="position: relative;  border-bottom: 1px dashed #eaeaea;">
                                         
                                          
                                       <section class="panel">
                                                <header class="panel-heading" style="background-color: #667fa0; color: #FFFFFF">
                                                    '.$key['NOMBRES'].' '.$key['APELLIDOS'].'  <span  style="float: right;">Fecha: '.$key['FECHA_SEGUIMIENTO'].'</span>
                                                </header>
                                                <div class="panel-body"  style="background-color: #f7f7f7;">
                                                    <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         '.$key['SEG_COMENTARIO'].'    </font></font></p> 

                                                </div>
                                            </section>
                                      </div>
                                  </div>';
                                  } }?>

                                  <div class="form-group">
                                     
                                      <div class="col-sm-11">
                                          
                                            <section class="panel">
                                                <header class="panel-heading" style="background-color: #56d44e; color: #FFFFFF">
                                                    Ingresar nuevo seguimiento:
                                                </header>
                                                <div class="panel-body"  style="background-color: #f7f7f7;">
                                                    <textarea class="form-control" id="seguimiento" name="seguimiento" required></textarea>

                                                </div>
                                            </section>

                                               <input type="hidden" id="flagprod"  name="flagprod" value="15" >
                                                <input type="hidden" id="segid"  name="segid" value="5" >
                                           <input type="hidden"  name="id_tk" value="<?=$_GET['idp']?>" >
                                         
                                      </div>
                                  </div>
                                   
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font></font></font></label>
                                      <div class="col-sm-10">
                                         <button type="submit" id="btnchg" class="btn btn-success" >Guardar Seguimiento</button>
                                         <button type="submit" class="btn btn-primary">Guardar y Cerrar ticket</button>
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
              2017 &copy; Programación 4 - Virtual-01
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
      
      <script src="js/owl.carousel.js" ></script>
      <script src="js/jquery.customSelect.min.js" ></script>
      <script src="js/respond.min.js" ></script>

          <!--right slidebar-->
          <script src="js/slidebars.min.js"></script>

          <!--common script for all pages-->
          <script src="js/common-scripts.js"></script>

          <!--script for this page-->
          <script src="js/sparkline-chart.js"></script>
      
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


$('#btnchg').click(function(){
    $('#segid').val('2');
   // $('#total').text('Product price: $1000');
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


