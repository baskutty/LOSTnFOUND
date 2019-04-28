<?php
session_start();
$flag=$_SESSION['flag'];
if(!(isset($_SESSION['id'])&&$flag==1))
           {

           echo "<script>window.open('login.php','_self')</script>";


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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug #e8b163-->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    
  <!-- CSS_ADSBLOCK_START -->

</head>

<body style="background-image: url('1.jpg'); width: 100%;">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a style="color:#9cc306;font-size: 30px;" class="navbar-brand" href="admin_home.php"> LOST N FOUND</a>
		 
		 
        </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
           <form method="get" action="results.php" enctype="multipart/form-data" class="navbar-form navbar-right search">
            

</form>
          <ul class="nav navbar-nav navbar-right" style="padding-right: 5px;">
           
            
            <?php $username=$_SESSION['username'];
            echo "<li style='    color: wheat;
    padding-top: 10px;
    font-size: 25px;'>$username </li>"; ?>
            
          </ul>
         
        </div>
 </nav>
 <div class="container-fluid">
      <div class="row"  >
        <div class="col-sm-3 col-md-2 sidebar" style="padding-top: 90px;">
          <br>
           <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;"  href="admin_addblog.php">Add Blog</a></div>
          
           <div id="sidebar_title" style="font-size: 2em;background-color: 	#808080;"><a style="color: 		#8FBC8F;" href="admin_history.php">History</a></div>
          
          <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;" href="logout.php">Logout</a></div>
		  <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;" href="admin_adduser.php">Add User</a></div>
		   <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;" href="admin_delete.php">Delete User</a></div>
		   <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;" href="admin_spamcheck.php">Spam Check</a></div>
        <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color:    #8FBC8F;" href="pending.php">Pending Blogs</a></div>
        
     </div>   

        

          
          
          </div>
        
      </div>
         
   

  <div>
<table  style="background-color:#F0F8FF;     margin-left: 280px;" align="center" width="1000"  border="5" >

<tr align="center" >
 
  <th style="text-align: center;line-height: 25px;">S.no</th>
  <th style="text-align: center;line-height: 25px;">Blog Name</th>
  <th style="text-align: center;line-height: 25px;">Description</th>
  <th style="text-align: center;line-height: 25px;">Timestamp</th>
  <th style="text-align: center;line-height: 25px;">View Blog</th>
  <th style="text-align: center;line-height: 25px;">Edit Blog</th>
  <th style="text-align: center;line-height: 25px;">Delete Blog</th>
  
  
  
  
</tr>
<?php

$userid=$_SESSION['id'];

$con=mysqli_connect("localhost","root","","lostnfound");
 

$i=1;

  
  $blog="select * from blog where ownerID='$userid' order by refNo desc";
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
<td><a href='admin_view.php?blog_id=$blog_id'>view</a></td>
  <td><a href='admin_edit_blog.php?blog_id=$blog_id'>edit</a></td>
  <td><a href='admin_delete_blog.php?blog_id=$blog_id' onClick=\"javascript:return confirm('are you sure you want to delete this?');\">delete</a></td></tr>";

$i=$i+1;

  }


  

?>
</table>


</div>

	 

	</body>
	</html>