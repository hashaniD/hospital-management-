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
                  <h4 class="card-title">Request drugs </h4>
                  
                  <!-- <form action="" method="POST"> -->
                  <div class="form-group">
                      <label for="exampleInputEmail1">Date</label>
                      <input type="Date" name="date" class="form-control" id="date" placeholder="Please Enter Here">
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of the Ward</label>
                      <select name="ward" class="form-control" id="ward" >
                      <?php
                        include_once("dbcon.php");
                        $query="SELECT `wardidx`,`wardno` FROM `ward`";
                       $sql=mysqli_query($con,$query);
                       
                       while( $result=mysqli_fetch_assoc($sql)){
                      
                       ?>
                        <option value="<?php echo $result["wardidx"]; ?>" ><?php echo  $result["wardno"];
                         ?> 
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name of the Drug</label>
                      <input type="text" name="ndrug" class="form-control" id="ndrug" placeholder="Please Enter Here">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Balance</label>
                      <input type="text" name="bal" class="form-control" id="bal" placeholder="Please Enter Here">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Request quantity</label>
                      <input type="text" name="qty" class="form-control" id="qty" placeholder="Please Enter Here">
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
              var date = $('#date').val();
              var ndrug=$('#ndrug').val();
         
              var ward = $('#ward').find(":selected").val();
              var bal=$('#bal').val();
              var qty=$('#qty').val();
              $.ajax({
              type: "POST",
              url: "orderdb.php",
              data: {date:date, ndrug:ndrug,ward:ward,bal:bal,qty:qty},
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

