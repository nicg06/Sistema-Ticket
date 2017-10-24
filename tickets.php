<?php 
require_once("class/class.php");


//print_r($_SESSION); exit;
if (isset($_SESSION["session_tickets"])) {
  # 

$nomses='';
$tra=new trabajo();
$prt=$tra->traer_ticket();

$nom=$tra->get_datos_usuario($_SESSION["session_tickets"]);
$nomses=$nom[0]['NOMBRES'].' '.$nom[0]['APELLIDOS'];
$coduser=$nom[0]['COD_USUARIO'];
require_once("template/header.php") ;
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
                  

                 <div class="col-sm-12">
              <section class="panel">
              <header class="panel-heading">
                  Dynamic Table
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>

              <div class="panel-body">
              <a href="ingresar_ticket.php?idp"><button type="button" class="btn btn-success"><i class="fa fa-cloud-upload"></i> Nuevo Ticket </button></a>
              <div class="adv-table">
              <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row-fluid">

              </div>
              
              <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
              <thead>
              <tr role="row">
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 100.778px;">Ticket</th>
              <th class="sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 278.778px;">Titulo</th>
              <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 93.778px;">Prioridad</th>
              <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 116.778px;">Area</th>
              <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156.778px;">Ingreso</th>
              <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending" style="width: 125.778px;">Estado</th>
              <th class="hidden-phone sorting_desc" role="columnheader" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-sort="descending" aria-label="CSS grade: activate to sort column ascending" style="width: 110.778px;">Usuario</th>
              <th class="hidden-phone" rowspan="1" colspan="1"  style="width: 206.778px;">Acciones</th></tr>
              </thead>
              
              <tfoot>
              <tr><th rowspan="1" colspan="1">Ticket</th><th rowspan="1" colspan="1">Titulo</th><th rowspan="1" colspan="1">Prioridad</th><th class="hidden-phone" rowspan="1" colspan="1">Area</th><th class="hidden-phone" rowspan="1" colspan="1"> Ingreso</th><th class="hidden-phone" rowspan="1" colspan="1">Estado</th>
              <th class="hidden-phone" rowspan="1" colspan="1">Usuario</th>
              <th class="hidden-phone" rowspan="1" colspan="1">Accion</th>

              </tr>
              </tfoot>
              <tbody role="alert" aria-live="polite" aria-relevant="all">
              <?php foreach ($prt as $key ) { ?>
                

              <tr class="gradeX odd">
                  <td class=" "> <?=$key['COD_TICKET']?> </td>
                  <td class=" "><?=$key['TITULO_TICKET']?></td>
                  <td class="center hidden-phone"><?php if($key['PRIORIDAD']==1 ){echo '<span class="badge badge-sm label-danger">ALTA</span>';} elseif ($key['PRIORIDAD']==2) {echo '<span class="badge badge-sm label-warning">NORMAL</span>';}else{echo '<span class="badge badge-sm label-primary">BAJA</span>';}?></td>
                  <td class="center hidden-phone "><?=$key['ID_DEPTO']?></td>
                  <td class="center hidden-phone "><?=$key['FECHA_ALTA']?></td>
                  <td class="center hidden-phone  sorting_1"><?php
                        if($key['ESTADO']=='CERRADO' ){echo '<span class="badge badge-sm label-inverse">CERRADO</span>';} elseif ($key['ESTADO']=='ABIERTO') {echo '<span class="badge badge-sm label-primary">ABIERTO</span>';}else{echo '<span class="badge badge-sm label-info">PENDIENTE</span>';} 

                        ?>
                  </td>
                   <td class="center hidden-phone  sorting_1">USER1</td>
                   <td class="">
                     <a href="editar_ticket.php?idp=<?=$key['ID_TICKET']?>&idst=<?=$key['ESTADO']?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i><font><font class=""> Atender </font></font></button></a>
                     <a href="editar_ticket.php?idp=<?=$key['ID_TICKET']?>"> <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i><font><font class=""> Eliminar </font></font></button></a>
                   </td>
              </tr>
             <?php }
              ?>         
                 
               
             </tbody></table><div class="row-fluid"><div class="span6"></div><div class="span6"></div></div></div>
              </div>
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
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><font><font>×</font></font></button>
                                              <h4 class="modal-title"><font><font>modal Tittle</font></font></h4>
                                          </div>
                                          <div class="modal-body"><font><font>

                                              Cuerpo pasa aquí ...

                                          </font></font></div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button"><font><font>Cerca</font></font></button>
                                              <button class="btn btn-success" type="button"><font><font>Guardar cambios</font></font></button>
                                          </div>
                                      </div>
                                  </div>
                              </div>


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
      <script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
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

             <!--dynamic table initialization -->
    <script src="js/dynamic_table_init.js"></script>

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
