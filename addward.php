<?php
include_once("dbcon.php");
$wardno=$_POST['wardno'];
$wardcat=$_POST['wardcat'];
$wardinch=$_POST['wardinch'];

$check="SELECT  `wardinch` FROM `ward` WHERE `wardno`='$wardno'";
$result=mysqli_query($con,$check);
$find= mysqli_num_rows($result);
if ($find == 0){
    $query="INSERT INTO `ward`( `wardno`, `wardcat`, `wardinch`) VALUES ('$wardno','$wardcat','$wardinch')";
$sql=mysqli_query($con,$query);
    Print "1";
/*     header("location:wardadd.php"); */
}
else{
    Print "0";
/*     header("location:wardadd.php");
 */}

?>  