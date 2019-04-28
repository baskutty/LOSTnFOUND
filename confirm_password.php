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
  <table align="center" width="550" height="300" style="background-color:  #2868aa;background-image: url('1.jpg'); ">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center;color:#FFFAFA;">RESET PASSWORD</h1></td>
    </tr>

<tr>
      <td style="padding-right:5;color:#FFFAFA;" align="right">NEW PASSWORD:  </td>
      <td style="padding-left:5"><input type="text" name="user_pass" placeholder=" password " required></td>
    </tr>
    

    
<tr>
      <td></td>
      <td  style="float:left;" class="sansserif"  ><input type="submit" name="c_pass" value="Reset Password"/></td>
      
    </tr>

  </table>
</form>


</div>

	 

	</body>
	</html>
  <?php
$con=mysqli_connect("localhost","root","","lostnfound");
$userid=$_GET['userid'];
if(isset($_POST['c_pass']))
{






$pass=$_POST['user_pass'];
$update_pass="update User set password='$pass' where userID='$userid'";
$run_update=mysqli_query($con,$update_pass);
echo "<script>alert('PASSWORD CHANGED')</script>";
echo "<script>window.open('login.php','_self')</script>";
}
?>