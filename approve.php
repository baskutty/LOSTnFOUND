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


$update_blog="update blog set status='1' where refNo='$blog_id'";
$run_update=mysqli_query($con,$update_blog);

if($run_update)
{
  echo "<script>alert('THE BLOG IS APPROVED!')</script>";
  echo "<script>window.open('admin_home.php','_self')</script>";
}
}
?>