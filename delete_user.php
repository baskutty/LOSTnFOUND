<?php
session_start();
$flag=$_SESSION['flag'];
if(!(isset($_SESSION['id'])&&$flag==1))
           {

           echo "<script>window.open('login.php','_self')</script>";


           }
           date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');

 if(isset($_GET['user_id']))
    {

$user_id=$_GET['user_id'];
$con=mysqli_connect("localhost","root","","lostnfound");
$get_mov="delete from message where reciever=$user_id or sender=$user_id";
$run_mov=mysqli_query($con,$get_mov);
$get_movs="delete from user where userID=$user_id";
$run_movs=mysqli_query($con,$get_movs);
$get_movsi="delete from blog where ownerID=$user_id";
$run_movsi=mysqli_query($con,$get_movsi);
if($run_movs&&$run_movsi)
{
  echo "<script>alert('THE USER IS DELETED!')</script>";
  echo "<script>window.open('admin_delete.php','_self')</script>";
}
}
?>