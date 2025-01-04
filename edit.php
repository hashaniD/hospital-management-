<?php
include_once("dbcon.php");
$status=$_POST['status'];
$idx=$_POST['idx'];
$currentDateTime = new DateTime('now');
$date = $currentDateTime->format('Y-m-d');

if($status=="Delivered"){
$query="UPDATE `order_table` SET `status`= '$status', `deliverydate`= '$date' WHERE `orderid`='$idx'";
$sql=mysqli_query($con,$query);
Print "1";
}else{
    $query="UPDATE `order_table` SET `status`= '$status', `deliverydate`= NULL WHERE `orderid`='$idx'";
    $sql=mysqli_query($con,$query); 
    Print "0";  
}
?>