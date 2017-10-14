<?php require_once("template/header.php") ;

require_once("class/class.php");


$tra=new trabajo();
if ($_GET['idp'] !='') {
  # code...
  $prt=$tra->traer_ticket_id($_GET['idp']);
}

  print_r($prt);
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
                             Ingreso de Producto
                          </font></font></header>
                          <div class="panel-body">
                              <form class="form-horizontal" name="formprod" id="formprod" action="controller.php" method="post" >
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Tipo de Incidencia</font></font></label>
                                      <div class="col-sm-10">  
                                        <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['TITULO_TICKET']?></font></font></p>                                     
                                      </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Departamento</font></font></label>
                                      <div class="col-sm-10"> 
                                         <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['ID_DEPTO']?></font></font></p>  
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Prioridad de Incidencia</font></font></label>
                                      <div class="col-sm-10">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['PRIORIDAD']?></font></font></p>  
                                        </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Fecha Ingreso</font></font></label>
                                      <div class="col-sm-10">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['FECHA_ALTA']?></font></font></p> 
                                        
                                        </div>
                                  </div>
                                 
                                  
                                  <div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Descripción</font></font></label>
                                      <div class="col-sm-10">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['DESCRIPCION']?></font></font></p> 
                                        
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Comentario</font></font></label>
                                      <div class="col-sm-10">
                                          <p class="text-muted"><font style="vertical-align: inherit; font-size: 14.5px"><font style="vertical-align: inherit;">
                                         <?=$prt[0]['COMENTARIO']?></font></font></p> 
                                           <input type="hidden"  name="flagprod" value="15" >
                                           <input type="hidden"  name="id_prod" value="<?=$_GET['idp']?>" >
                                          
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font>Seguimiento</font></font></label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" id="seguimiento" name="seguimiento" ></textarea>
                                          
                                               <input type="hidden"  name="flagprod" value="15" >
                                           <input type="hidden"  name="id_prod" value="<?=$_GET['idp']?>" >
                                          
                                      </div>
                                  </div>
                                   
                                   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"><font><font></font></font></label>
                                      <div class="col-sm-10">
                                         <button type="submit" class="btn btn-success">Guardar Producto</button>
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

  </script>

  </body>
</html>
