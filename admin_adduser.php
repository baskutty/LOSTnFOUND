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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- style="font-size:1.5em;"Custom styles for this template -->
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
          <a style="color:#9cc306;font-size: 30px" class="navbar-brand" href="admin_home.php">LOST N FOUND</a>
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

<form action="" method="post" enctype="multipart/form-data">
  <table align="center" width="550" height="300" style="background-color:  lightsteelblue ">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center;color:#FFFAFA;font-style:Gill Sans;font-weight: bold">ADD USER </h1></td>
    </tr>

<tr>
      <td style="padding-right:5;color:#FFFAFA;font-size:1.5em;" align="right">USERNAME:  </td>
      <td style="padding-left:5"><input type="text" name="user_name" placeholder=" User Name " required></td>
    </tr>
    
<tr>
      <td style="padding-right:5;color:#FFFAFA;font-size:1.5em;" align="right">PASSWORD:  </td>
      <td style="padding-left:5"><input type="password" name="user_pass" placeholder=" Password " required></td>
    </tr>
	
	<tr>
      <td style="padding-right:5;color:#FFFAFA;font-size:1.5em;" align="right">EMAIL ID:  </td>
      <td style="padding-left:5"><input type="email" name="email_id" placeholder=" email Id " required></td>
    </tr>
	
	<tr>
      <td style="padding-right:5;color:#FFFAFA;font-size:1.5em;" align="right">ROLL NO:  </td>
      <td style="padding-left:5"><input type="text" name="roll_no" placeholder=" roll no " required></td>
    </tr>
    <tr>
      <td style="padding-right:5;color:#FFFAFA;font-size:1.5em;" align="right">MOB NO:  </td>
      <td style="padding-left:5"><input type="text" name="mob_no" placeholder=" mob no " required></td>
    </tr>
	

<tr>
      <td></br></br></td>
      <td  style="float:left;font-size:1.5em;"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="add_user" value="add user"/></td>
      <td  style="float:left;font-size:1.5em;"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" name="reset" value="reset"/></td>
    </tr>

  </table>
</form>


</div>

	 <br>
   <br>

	</body>
	</html>
   <?php
$con=mysqli_connect("localhost","root","","lostnfound");
if(isset($_POST['add_user']))
{
$username=$_POST['user_name'];
$password=$_POST['user_pass'];
$email=$_POST['email_id'];
$roll_no=$_POST['roll_no'];
$mob_no=$_POST['mob_no'];

$insert_user="insert into user(username,password,emailID,flag) values ('$username','$password','$email','0')";

$insert_use= mysqli_query($con, $insert_user);

$get_user="select * from User where username='$username'";
$run_user=mysqli_query($con,$get_user);



if($row_user=mysqli_fetch_array($run_user))
{


$userid=$row_user['userID'];



$insert_q1="insert into security_questions(userID,question,answer) values ('$userid','ROLL NO','$roll_no')";
$insert_qu1= mysqli_query($con, $insert_q1);
$insert_q2="insert into security_questions(userID,question,answer) values ('$userid','MOB NO','$mob_no')";
$insert_qu2= mysqli_query($con, $insert_q2);
if($insert_use&&$insert_qu1&&$insert_qu2)
{
  echo "<script>alert('THE USER IS ADDED!')</script>";
  echo "<script>window.open('admin_delete.php','_self')</script>";
}

}
}
?>