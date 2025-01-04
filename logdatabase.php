<?php
include_once("dbconnect.php");

session_start();

$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$email=$_POST['email'];
$Password=$_POST['Password'];
$ConfirmPassword=$_POST['ConfirmPassword'];


$check="SELECT  `Password` FROM `users` WHERE `email`='$email'";
$result=mysqli_query($con,$check);
$find= mysqli_fetch_assoc($result);
$pass=$find["Password"];
$type=$find["email"];

if ($Password == $Password){
    $_SESSION['email']=$email;
    $_SESSION['Pawssord']=$Password;
    Print "1";

/* header("location:home.php");  */
}
else{
    Print "0";
/*     header("location:wardadd.php");
 */}

?>  