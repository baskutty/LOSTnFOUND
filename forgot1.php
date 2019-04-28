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
      <td colspan="5"><h1 style="text-align:center;color:#FFFAFA;">FORGOT PASSWORD?</h1></td>
    </tr>

<tr>
      <td style="padding-right:5;color:#FFFAFA;" align="right">USERNAME:  </td>
      <td style="padding-left:5"><input type="text" name="user_name" placeholder=" User Name " required></td>
    </tr>
    

    
<tr>
      <td></td>
      <td  style="float:left;" class="sansserif"  ><input type="submit" name="c_pass" value="Change Password"/></td>
      
    </tr>

  </table>
</form>


</div>

	 

	</body>
	</html>
  <?php
$con=mysqli_connect("localhost","root","","lostnfound");
if(isset($_POST['c_pass']))
{
$username=$_POST['user_name'];

$get_user="select * from User where username='$username'";
$run_user=mysqli_query($con,$get_user);



if($row_user=mysqli_fetch_array($run_user))
{


$userid=$row_user['userID'];

echo "<script>window.open('forgot2.php?userid=$userid','_self')</script>";
}
else
{
  echo "<script>alert('INVALID USERNAME')</script>";
echo "<script>window.open('forgot1.php','_self')</script>";
}
}
?>