<?php
include_once("dbcon.php");
$date=$_POST['date'];
$ward=$_POST['ward'];
$ndrug=$_POST['ndrug'];
$bal=$_POST['bal'];
$qty=$_POST['qty'];

$check="SELECT  `ndrug` FROM `order_table` WHERE `ndrug`='$ndrug'";
$result=mysqli_query($con,$check);
$find= mysqli_num_rows($result);
if ($find == 0){
    $query="INSERT INTO `order_table`( `date`,`ward`, `ndrug`, `bal`,`qty`,`status`,`deliverydate`) VALUES ('$date','$ward','$ndrug','$bal','$qty','Pending', NULL)";
$sql=mysqli_query($con,$query);
    Print "1";
/*     header("location:wardadd.php"); */
}
else{
    Print "0";
/*     header("location:wardadd.php");
 */}

?>  