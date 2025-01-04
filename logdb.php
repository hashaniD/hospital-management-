<?php
include_once("dbcon.php");
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$check="SELECT  `password`,`type` FROM `user` WHERE `username`='$username'";
$result=mysqli_query($con,$check);
$find= mysqli_fetch_assoc($result);
$pass=$find["password"];
$type=$find["type"];

if ($password == $pass){
    $_SESSION['username']=$username;
    $_SESSION['type']=$type;
    Print "1";

/* header("location:home.php");  */
}
else{
    Print "0";
/*     header("location:wardadd.php");
 */}

?>  