<?php
include_once("header.php"); 
include_once("dbcon.php");
$sql="SELECT * FROM `ward`";
$query=mysqli_query($con,$sql);

?>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
include_once("navi.php"); 
?>
      <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <?php
include_once("setting.php"); 
?>
          <!-- To do section tab ends -->
          <?php
include_once("chat.php"); 
?> 
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <?php
      if($_SESSION['type']=="user"){
        include_once("usersidebar.php"); 
      }else if($_SESSION['type']=="admin"){
        include_once("adminsidebar.php"); 
      }

?>  
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
      <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ward details</h4>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Ward Number
                          </th>
                          <th>
                            Ward catogory
                          </th>
                          <th>
                            Ward Incharge
                          </th>
                        </tr>
                      </thead>
                      <?php
                      $id=1;
                      while($find=mysqli_fetch_assoc($query)) {

                      
                      ?>
                      <tbody>
                        <tr class="table-info">
                          <td>
                          <?php echo $id ?>
                          </td>
                          <td>
                            <?php echo $find["wardno"]; ?>
                          </td>
                          <td>
                          <?php echo $find["wardcat"]; ?>
                          </td>
                          <td>
                          <?php echo $find["wardinch"]; ?>
                          </td>
                        </tr>
                        <?php $id++; }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
  <?php
  include_once("footer.php");
  ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

