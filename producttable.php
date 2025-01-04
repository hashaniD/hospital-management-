OCTYPE html>
<html>

<head>
    <!-- Add your head content here -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <!--  - partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- To-do section tab ends -->

            <!-- Chat tab ends -->
        </div>
        <!-- partial -->
    </div>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">product details</h4>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>

                                        <tr>
                                            <th> # </th>
                                            <th> user id </th>
                                            <th> product id </th>
                                            <th> product name </th>
                                            <th> quantity </th>
                                            <th> price </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                    $query = mysqli_query($con, $sql);

if (!$query) {
    die("Database query failed: " . mysqli_error($con));
}

$id = 1;
while ($find = mysqli_fetch_assoc($query)) {
    // Your code to display data in the HTML table
}?>
                                            <tr class="table-info">
                                                <td> <?php echo $id ?> </td>
                                                <td> <?php echo $find["userid"]; ?> </td>
                                                <td> <?php echo $find["pid"]; ?> </td>
                                                <td> <?php echo $find["pname"]; ?> </td>
                                                <td> <?php echo $find["qty"]; ?> </td>
                                                <td> <?php echo $find["price"]; ?> </td>
                                            </tr>
                                        <?php
                                            $id++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->

    <!-- partial -->
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