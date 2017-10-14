<?php require_once("template/header.php") ?>
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
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  0
                              </h1>
                              <p>Clientes</p>
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
                                  0
                              </h1>
                              <p>Salas</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                                  0
                              </h1>
                              <p>Venta Diaria</p>
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
                                  0
                              </h1>
                              <p>Meta de Ventas Mensual</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-8">
                      <!--custom chart start-->
                      <div class="border-head">
                          <h3>Gráfica de Venta Mensual</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>100</span></li>
                              <li><span>80</span></li>
                              <li><span>60</span></li>
                              <li><span>40</span></li>
                              <li><span>20</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">Ene</div>
                              <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Feb</div>
                              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Mar</div>
                              <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Abr</div>
                              <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                          </div>
                          <div class="bar">
                              <div class="title">May</div>
                              <div class="value tooltips" data-original-title="20%" data-toggle="tooltip" data-placement="top">20%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Jun</div>
                              <div class="value tooltips" data-original-title="39%" data-toggle="tooltip" data-placement="top">39%</div>
                          </div>
                          <div class="bar">
                              <div class="title">Jul</div>
                              <div class="value tooltips" data-original-title="75%" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Ago</div>
                              <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Sep</div>
                              <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Oct</div>
                              <div class="value tooltips" data-original-title="42%" data-toggle="tooltip" data-placement="top">42%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Nov</div>
                              <div class="value tooltips" data-original-title="60%" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Dic</div>
                              <div class="value tooltips" data-original-title="90%" data-toggle="tooltip" data-placement="top">90%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
                  </div>
                  <div class="col-lg-4">
                      <!--new earning start-->
                      <div class="panel terques-chart">
                          <div class="panel-body chart-texture">
                              <div class="chart">
                                  <div class="heading">
                                      <span>Mes Mayor Utilidad</span>
                                      <strong>Junio</strong>
                                  </div>
                                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title">Ganacia</span>
                          </div>
                      </div>
                      <!--new earning end-->

                      <!--total earning start-->
                      <div class="panel green-chart">
                          <div class="panel-body">
                              <div class="chart">
                                  <div class="heading">
                                      <span>Total Utilidad</span>
                                      <strong>$ 2557.00</strong>
                                  </div>
                                  <div id="barchart"></div>
                              </div>
                          </div>
                          <div class="chart-tittle">
                              <span class="title">Utilidad Neta</span>
                              <span class="value">$1205.05</span>
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
          <script src="js/count.js"></script>

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
