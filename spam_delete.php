<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$flag=$_SESSION['flag'];
if(!(isset($_SESSION['id'])&&$flag==1))
           {

           echo "<script>window.open('login.php','_self')</script>";


           }

$timestamp=date('Y-m-d H:i:s');

 $userid=$_SESSION['id'];
    if(isset($_GET['blog_id']))
    {

$blog_id=$_GET['blog_id'];
$con=mysqli_connect("localhost","root","","lostnfound");
$get_mov="delete from message where refNo=$blog_id";
$run_mov=mysqli_query($con,$get_mov);

$get_movs="delete from blog where refNo=$blog_id";
$run_movs=mysqli_query($con,$get_movs);
if($run_movs)
{
  echo "<script>alert('THE BLOG IS DELETED!')</script>";
  echo "<script>window.open('admin_spamcheck.php','_self')</script>";
}
}
?>