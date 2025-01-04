<?php
include_once("dbcon.php");
$id=$_POST['id'];
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$qty=$_POST['qty'];
$price=$_POST['price'];

$check="SELECT  `product` FROM `red` WHERE `pid`='$pid'";
$result=mysqli_query($con,$check);
$find= mysqli_num_rows($result);
if ($find == 0){
    $query="INSERT INTO `product`( id`, `pid`, `pname`,`qty`,`price`) VALUES ('$id','$pid','$pname','$qty','$price')";
$sql=mysqli_query($con,$query);
    Print "1";
/*     header("location:wardadd.php"); */
}
else{
    Print "0";
/*     header("location:wardadd.php");
 */}

?>  