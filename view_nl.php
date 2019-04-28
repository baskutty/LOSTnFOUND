<?php
session_start();
if((isset($_SESSION['id'])))
{
  $flag=$_SESSION['flag'];}
if((isset($_SESSION['id'])&&$flag==1))
           {

           echo "<script>window.open('admin_home.php','_self')</script>";


           }
          else if((isset($_SESSION['id'])&&$flag==0))
           {

           echo "<script>window.open('home.php','_self')</script>";


           }
           date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=""/>

    <title>LOST & FOUND</title>

    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    
  <!-- CSS_ADSBLOCK_START -->

</head>

<body style="background-image: url('background.jpg'); width: 100%;">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a style="color:#9cc306;font-size: 30px;text-align:center" class="navbar-brand" href="index.php">NITC LOST N FOUND</a>
        </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
           
          <ul class="nav navbar-nav navbar-right" style="padding-right: 5px;">
           
            
            <li><a href="login.php">Login</a></li>
            
          </ul>
         
        </div>
 </nav>
 
   

<center>

<?php

if(isset($_GET['blog_id']))
  {$blog_id=$_GET['blog_id'];

$con=mysqli_connect("localhost","root","","lostnfound");
 

$i=1;

  
  $blog="select * from blog where refNo='$blog_id'";
  $run_blog=mysqli_query($con,$blog);
  while($row_blog=mysqli_fetch_array($run_blog))
  {
    $blog_id=$row_blog['refNo'];
    $userid=$row_blog['ownerID'];
$text=$row_blog['text'];
    $timestamp=$row_blog['timeStamp'];
$line=explode("\n", $text);
$name=$line['0'];
$length=sizeof($line);
$i=1;
$description="";
for($i=1;$i<$length;$i++)
{$description.=$line[$i];

}
 $user="select * from user where userID='$userid'";
$run_user=mysqli_query($con,$user);
  while($row_user=mysqli_fetch_array($run_user))
  {$username=$row_user['username'];
$email=$row_user['emailID'];
     echo "
<div id='movie_box' class='dashdiv' style='
    padding: 10px;
    margin-top:25px;
    text-align: center;
    width:600px;
    word-wrap: break-word;
    display: inline-block;
    background-color: white;
    border: 2px solid grey;
    border-radius: 8px;
    margin-bottom: 40px;'>



<h4 font-size:150%>$name</h4>

<p>Description :<b>$description</b></p>
<p>Username:<b> $username</b></p>
<p>Email:<b> $email</b></p>





";
}

  }
}

  

?>




</center>
	 

	</body>
	</html>