<?php
session_start();
date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');

 $userid=$_SESSION['id'];
    if(isset($_GET['blog_id']))
    {

$blog_id=$_GET['blog_id'];
$con=mysqli_connect("localhost","root","","lostnfound");

$get_blog="select * from blog where refNo='$blog_id'";
$run_blog=mysqli_query($con,$get_blog);
while($row_blog=mysqli_fetch_array($run_blog))
{
  
 

 $id=$row_blog['ownerID'];
 if($userid!=$id)
 {echo "<script>alert('NOT YOUR BLOG')</script>";
  echo "<script>window.open('admin_home.php','_self')</script>";

 }
}
$get_mov="delete from message where refNo=$blog_id";
$run_mov=mysqli_query($con,$get_mov);
$get_movs="delete from blog where refNo=$blog_id";
$run_movs=mysqli_query($con,$get_movs);
if($run_movs)
{
  echo "<script>alert('THE BLOG IS DELETED!')</script>";
  echo "<script>window.open('admin_history.php','_self')</script>";
}
}
?>