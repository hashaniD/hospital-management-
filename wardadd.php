<?php
include_once("header.php"); 
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Default form</h4>
                  <p class="card-description">
                    Basic form layout
                  </p>
                  <!-- <form action="" method="POST"> -->
                    <div class="form-group">
                      <label for="exampleInputUsername1">Ward NO</label>
                      <input type="text" name="wardno" class="form-control" id="wardno" placeholder="Please Enter Here">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ward Catogary</label>
                      <input type="text" name="wardcat" class="form-control" id="wardcat" placeholder="Please Enter Here">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ward Incharge</label>
                      <input type="text" name="wardinch" class="form-control" id="wardinch" placeholder="Please Enter Here">
                    </div>
                    
                    <button id="savebtn" type="submit" class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-light">Cancel</button>
                  <!-- </form> -->
                </div>
              </div>
             </div>
             <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
            $(document).ready(function() {
                $('#savebtn').click(function() {
              var wardno = $('#wardno').val();
              var wardcat=$('#wardcat').val();
              var wardinch=$('#wardinch').val();
              $.ajax({
              type: "POST",
              url: "addward.php",
              data: {wardno:wardno, wardcat:wardcat,wardinch:wardinch},
              success: function(response){
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
              });
              });
              </script>
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

