<?php require_once("template/header.php") ;

require_once("class/class.php");


$tra=new trabajo();
if ($_GET['idp'] !='') {
  # code...
  $prt=$tra->traer_ticket_id($_GET['idp'],$_GET['idst']);
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
                              <form class="form-horizontal" name="formprod" id="formprod" action="controller.php" method="post" >
                                  

                                <div class="panel-body" style="background-color: #f5f5f5;">
                                      <div class="row m-bot15">
                                          <div class="col-sm-6 ">
                                       <div class="form-group">
                                        <label class="col-sm-3 col-sm-3 control-label"><font><font>Titulo Ticket:</font></font></label>
                                        <div class="col-sm-5" style="position: relative; padding: 2px 3px; border-bottom: 1px dashed #eaeaea;">  
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                           <?=$prt[0]['TITULO_TICKET']?></font></font></p>                                     
                                        </div>
                                      </div>
                                          </div>
                                          <div class="col-sm-6 \">
                                            <div class="form-group">
                                            <label class="col-sm-3 col-sm-3 control-label"><font><font>Departamento:</font></font></label>
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
                                      <label class="col-sm-3 col-sm-3 control-label"><font><font>Prioridad:</font></font></label>
                                      <div class="col-sm-5">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['PRIORIDAD']?></font></font></p>  
                                        </div>
                                  </div>
                                          </div>
                                          <div class="col-sm-6">
                                              <div class="form-group">
                                      <label class="col-sm-3 col-sm-3 control-label"><font><font>Fecha Ingreso:</font></font></label>
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
                                      <label class="col-sm-3 col-sm-3 control-label"><font><font>Usuario:</font></font></label>
                                      <div class="col-sm-5">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         USER1</font></font></p> 
                                        
                                        </div>
                                  </div>
                                          </div>
                                          <div class="col-sm-6 ">
                                              <div class="form-group">
                                      <label class="col-sm-3 col-sm-3 control-label"><font><font>Estado:</font></font></label>
                                      <div class="col-sm-5">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['ESTADO']?></font></font></p> 
                                        
                                        </div>
                                  </div>
                                          </div>
                                      </div>
                                  </div><br>                                 
                                  
                                   
                                 
                                  
                                  <div>
                                  <div class="form-group ">
                                      <label class="col-sm-2 col-sm-2 control-label "><font><font>Descripción</font></font></label>
                                      <div class="col-sm-10">
                                          <p class="text-muted"><font style="font-size: 14.5px; color:#428bca; "><font style="vertical-align: inherit;">
                                         <?=$prt[0]['DESCRIPCION']?></font></font></p> 
                                        
                                      </div>
                                  </div>
                                  <!-- <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Comentario</font></font></label>
                                      <div class="col-sm-10" style="position: relative; padding: 2px 3px; border-bottom: 1px dashed #eaeaea;">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['COMENTARIO']?></font></font></p> 
                                          
                                          
                                      </div>
                                  </div> -->
                                  <?php if($_GET['idst']=='PENDIENTE' OR  $_GET['idst']=='CERRADO') { 
                                    foreach ($prt as $key) {
                                      
                                    
                                 echo '<div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Seguimiento</font></font></label>
                                      <div class="col-sm-10" style="position: relative; padding: 2px 3px; border-bottom: 1px dashed #eaeaea;">
                                         <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px; color:#428bca;"><font style="vertical-align: inherit;">
                                         '.$key['SEG_COMENTARIO'].'    Fecha:'.$key['FECHA_SEGUIMIENTO'].'</font></font></p> 
                                          
                                      </div>
                                  </div>';
                                  } }?>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Seguimiento</font></font></label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" id="seguimiento" name="seguimiento" ></textarea>
                                          
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
      <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
      <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
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
