<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$flag=$_SESSION['flag'];
if(!(isset($_SESSION['id'])&&$flag==1))
           {

           echo "<script>window.open('login.php','_self')</script>";


           }
date_default_timezone_set('Asia/Kolkata');
$con=mysqli_connect("localhost","root","","lostnfound");

$timestamp=date('Y-m-d H:i:s');
if(isset($_POST['reply']))
{
  $t=$_POST['message'];
$owner=$_POST['owner'];
$reciever=$_POST['reciever'];
$blog_id=$_POST['blog_id'];
$insert_mes="insert into message(timeStamp,sender,reciever,refNo,text) values ('$timestamp','$owner','$reciever','$blog_id','$t')";
$insert_mess= mysqli_query($con, $insert_mes);
if($insert_mess)
{
  echo "<script>alert('Message sent')</script>";
  echo "<script>window.open('view.php?blog_id=$blog_id','_self')</script>";
}

}
?>