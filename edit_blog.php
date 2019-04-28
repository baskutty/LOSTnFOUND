<?php
session_start();

$flag=$_SESSION['flag'];
if(!(isset($_SESSION['id'])&&$flag==0))
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
          <a style="color:#9cc306;font-size: 30px" class="navbar-brand" href="home.php">LOST N FOUND</a>
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
            <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;"  href="addblog.html">Add Blog</a></div>
          
           <div id="sidebar_title" style="font-size: 2em;background-color: 	#808080;"><a style="color: 		#8FBC8F;" href="history.php">History</a></div>
          
          <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;" href="logout.php">Logout</a></div>
        </div>

        

          
          
          </div>
        
      </div>
         
   

  <div>
 <?php
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
  echo "<script>window.open('home.php','_self')</script>";

 }
    $blog_id=$row_blog['refNo'];
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


}}

    ?>

<form action="" method="post" enctype="multipart/form-data">
  <table align="center" width="700" height="500" border="1" bgcolor="skyblue" style="background-color: lightsteelblue">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center">EDIT BLOG</h1></td>
    </tr>

<tr>
      <td align="right">Blog Title</td>
      <td><input type="text"  name="blog_title" value="<?php echo $name;?>" /></td>
    </tr>
    
    <tr>
      <td align="right">Description</td>
      <td><textarea name="blog_desc" cols="50" rows="10"><?php echo"$description";?> </textarea></td>
    </tr>
   
    
    <tr align="center" style="font-size:1.5em;">
      <td colspan="5"><input type="submit" name="insert_post" value="Edit Blog"/></td>
    </tr>




  </table>
</form>



</div>

	 <br>
   <br>

	</body>
	</html>
  <?php
  $blog_id=$_GET['blog_id'];
$con=mysqli_connect("localhost","root","","lostnfound");
if(isset($_POST['insert_post']))
{$get_mov="delete from message where refNo=$blog_id";
$run_mov=mysqli_query($con,$get_mov);
  $get_movs="delete from blog where refNo=$blog_id";
$run_movs=mysqli_query($con,$get_movs);
$title=$_POST['blog_title'];
$desc=$_POST['blog_desc'];
$text=$title.PHP_EOL.$desc;
$userid=$_SESSION['id'];

$insert_blog="insert into blog(timeStamp,spamCount,viewCount,text,ownerID) values ('$timestamp','0','0','$text','$userid')";

$insert_blo= mysqli_query($con, $insert_blog);

if($insert_blo)
{
  echo "<script>alert('THE BLOG IS EDITED!')</script>";
  echo "<script>window.open('history.php','_self')</script>";
}


}
?>