<?php
include_once("header.php"); 
include_once("dbcon.php");
$sql="SELECT * FROM `order_table` AS o LEFT JOIN `ward` AS w ON o.`ward` = w.`wardidx`";
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
                <h4 class="card-title blue-text">Drugs order List</h4>
                
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                           date
                          </th>
                          <th>
                          Ward
                          </th>
                          <th>
                          Name of the drug
                          </th>
                          <th>
                          balance
                          </th>
                          <th>
                          request quantity
                          </th>
                          <th>
                          Status
                          </th>
                          <th>
                          Delivered Date
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
                            <?php echo $find["date"]; ?>
                          </td>
                          <td>
                          <?php echo $find["wardno"]; ?>
                          </td>
                          <td>
                          <?php echo $find["ndrug"]; ?>
                          </td>
                          <td>
                          <?php echo $find["bal"]; ?>
                          </td>
                          <td>
                          <?php echo $find["qty"]; ?>
                          </td>
                          <td>
                            <input type="hidden" >
                            <select class="<?php
                            if ($find["status"] == 'Confirmed') {
                              echo 'badge badge-warning';
                            } elseif ($find["status"] == 'Pending') {
                              echo 'badge badge-info';
                            } elseif ($find["status"] == 'Delivered') {
                              echo 'badge badge-success';
                            }
                          ?>" data-id2="<?php echo $find["orderid"]; ?>" id="status" onchange="getval(this);" <?php echo $_SESSION['type']=="admin" ? 'disabled="disabled"' : ''; ?>>

                            <option class="badge badge-warning" value="Confirmed" <?php echo $find["status"] == 'Confirmed' ? 'selected="selected"' : ''; ?>>Confirmed</option>                            
                            <option class="badge badge-info" value="Pending" <?php echo $find["status"] == 'Pending' ? 'selected="selected"' : ''; ?>>Pending</option>
                            <option class="badge badge-success" value="Delivered" <?php echo $find["status"] == 'Delivered' ? 'selected="selected"' : ''; ?>>Delivered</option>
                          </select>
                          </td>
                          <td>
                          <?php echo $find["deliverydate"]; ?>
                          </td>
                        </tr>
                        <?php $id++; }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <script>
            function getval(sel)
            {
              //var status = $('#status').val();
               // Find the closest <tr> element to the <select> that was changed
              var $row = $(sel).closest('tr');
              
              // Get the data-id2 attribute from the <select> within the same row
              var idx = $row.find('#status').data("id2");
              var status = $row.find('#status').val();
              $.ajax({
              type: "POST",
              url: "edit.php",
              data: {status:status, idx:idx},
              success: function(response){
                location.reload();
                  if (response > 0){
                    Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Ward has been saved',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function() {
                    location.reload();
                  });
                  }else if (response==0)
                    {
                      Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'This Ward Is Already Taken',
                      showConfirmButton: false,
                      timer: 1500
                    }).then(function() {
                    location.reload();
                  });
                    }
                }
               });
              }
              </script>
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

