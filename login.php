<?php
session_start();
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
  <div>
<form action="" method="post" enctype="multipart/form-data">
  <table align="center" width="550" height="300" style="background-color:  #FFFAFA;background-image: url('1.jpg'); ">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center;color:#FFFAFA;font-style:Gill Sans;font-weight: bold">NITC LOST N FOUND </h1></td>
    </tr>

<tr>
      <td style="padding-right:5;color:#FFFAFA;" align="right">USERNAME:  </td>
      <td style="padding-left:5"><input type="text" name="user_name" placeholder=" User Name " required></td>
    </tr>
    
<tr>
      <td style="padding-right:5;color:#FFFAFA;" align="right">PASSWORD:  </td>
      <td style="padding-left:5"><input type="password" name="user_pass" placeholder=" Password " required></td>
    </tr>
    <tr>
      <td>
      </td>
    <td style="padding-right:5px; " align="right"><a style="color: #FFFAFA; padding-right:5;" href="forgot1.php">Forgot Password     </a></td>
  </tr>
<tr>
      <td></td>
      <td  style="float:left;"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="login" value="LOGIN"/></td>
      
    </tr>

  </table>
</form>


</div>

	 

	</body>
	</html>
  <?php
$con=mysqli_connect("localhost","root","","lostnfound");
if(isset($_POST['login']))
{
$username=$_POST['user_name'];
$password=$_POST['user_pass'];

$get_user="select * from User where username='$username' AND password='$password'";
$run_user=mysqli_query($con,$get_user);



if($row_user=mysqli_fetch_array($run_user))
{


$userid=$row_user['userID'];
$username=$row_user['username'];
$flag=$row_user['flag'];

$_SESSION['id']=$userid;
$_SESSION['username']=$username;
$_SESSION['flag']=$flag;
if($flag==1)
{
echo "<script>alert('LOGIN SUCCESSFULL')</script>";
echo "<script>window.open('admin_home.php','_self')</script>";
}
else
{
  echo "<script>alert('LOGIN SUCCESSFULL')</script>";
echo "<script>window.open('home.php','_self')</script>";
}

}





else
{echo "<script>alert('LOGIN UNSUCCESSFULL')</script>";
echo "<script>window.open('login.php','_self')</script>";

}

}
?>