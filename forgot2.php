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
  <table align="center" width="550" height="300" style="background-color:  #2868aa; background-image: url('1.jpg');">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center;color:#FFFAFA;">SECURITY QUESTIONS</h1></td>
    </tr>
<?php
$con=mysqli_connect("localhost","root","","lostnfound");
if(isset($_GET['userid']))
{$i=1;
  
$userid=$_GET['userid'];


$get_que="select * from security_questions where userID='$userid'";
$run_que=mysqli_query($con,$get_que);

while($row_que=mysqli_fetch_array($run_que))
{
$question=$row_que['question'];


echo "<tr>
      <td style='padding-right:5;color:#FFFAFA;' align='right'>Q$i:What is your $question  </td>
      <td style='padding-left:5'></td>
    </tr>
    
<tr>
      <td style='padding-right:5;color:#FFFAFA;' align='right'>A1:  </td>
      <td style='padding-left:5'><input type='text' name='answer$i' placeholder=' Answer$i ' required></td>
    </tr>
    
";
$i++;
      }}?>
      <td></td>
	  </br>
	  </br>
      <td  style="float:center; text-align:center;"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="reset" value="RESET PASSWORD"/></td>
      
    </tr>

  </table>
</form>


</div>

	 

	</body>
	</html>
<?php
$con=mysqli_connect("localhost","root","","lostnfound");
$userid=$_GET['userid'];
if(isset($_POST['reset']))
{


$get_ans="select * from security_questions where userID='$userid'";
$run_ans=mysqli_query($con,$get_ans);


$i=1;
$flag=1;
while($row_ans=mysqli_fetch_array($run_ans))
{

$ans=$row_ans['answer'];
$a="answer".$i;
$answer=$_POST[$a];
echo "$answer";
echo "$ans";
if($ans==$answer)
{

}
else
{
 $flag=0;
 break;
}
$i++;
}
if($flag==1)
{echo "<script>window.open('confirm_password.php?userid=$userid','_self')</script>";

}





else
{echo "<script>alert('WRONG ANSWER')</script>";
echo "<script>window.open('forgot1.php','_self')</script>";

}

}
?>