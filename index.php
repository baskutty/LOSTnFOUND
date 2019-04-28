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
          <a style="color:#9cc306;font-size: 30px;text-align:center" class="navbar-brand" href="#">NITC LOST N FOUND</a>
        </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
           
          <ul class="nav navbar-nav navbar-right" style="padding-right: 5px;">
           
            
            <li><a href="login.php">Login</a></li>
            
          </ul>
         
        </div>
 </nav>
 
   

  <div>
<table  style="background-color:#F0F8FF;" align="center" width="1000"  border="5" >

<tr align="center" >
 
  <th style="text-align: center;line-height: 25px;">S.no</th>
  <th style="text-align: center;line-height: 25px;">Blog Name</th>
  <th style="text-align: center;line-height: 25px;">Description</th>
  <th style="text-align: center;line-height: 25px;">Timestamp</th>
  <th style="text-align: center;line-height: 25px;">View</th>

  
  
</tr>
<?php



$con=mysqli_connect("localhost","root","","lostnfound");
 

$i=1;

  
  $blog="select * from blog where status='1' order by refNo desc";
  $run_blog=mysqli_query($con,$blog);
  while($row_blog=mysqli_fetch_array($run_blog))
  {
    $blog_id=$row_blog['refNo'];
$text=$row_blog['text'];
    $timestamp=$row_blog['timeStamp'];
$line=explode("\n", $text);
$name=$line['0'];
$desc=$line['1'];
$description=substr($desc,0,10);

     echo "<tr align='center'>
  <td>$i.</td>
  
  
  <td> $name</td>
  <td> $description.....</td>
  
<td> $timestamp</td>
  <td><a href='view_nl.php?blog_id=$blog_id'>view</a></td>
  
</tr>";

$i=$i+1;

  }


  

?>
</table>


</div>

	 

	</body>
	</html>