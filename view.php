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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug #e8b163-->
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
          <a style="color:#9cc306;font-size: 30px;" class="navbar-brand" href="home.php"> LOST N FOUND</a>
        </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <form method="get" action="results.php" enctype="multipart/form-data" class="navbar-form navbar-right search">
            <select name="user_id" style="width: 200px; height: 30px;">

          <option><b>Select a user</b></option>
             <?php 
         
$con=mysqli_connect("localhost","root","","lostnfound");

$get_cats="select distinct ownerID from blog where status='1' ";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
  $cat_id=$row_cats['ownerID'];
  $get_the="select  * from user where userID='$cat_id'";
$run_the=mysqli_query($con,$get_the);
while($row_the=mysqli_fetch_array($run_the))
  {$username=$row_the['username'];
$user_id=$row_the['userID'];
  echo "<option value='$user_id'>$username</option>";
}
}




    ?>
           
 </select>
  <input type="submit" class="btn btn-warning" name="filter" value="Filter" />

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
           <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;"  href="addblog.php">Add Blog</a></div>
          
           <div id="sidebar_title" style="font-size: 2em;background-color: 	#808080;"><a style="color: 		#8FBC8F;" href="history.php">History</a></div>
          
          <div id="sidebar_title" style="font-size: 2em;background-color: #808080;"><a style="color: 		#8FBC8F;" href="logout.php">Logout</a></div>
        </div>

        

          
          
          </div>
        
      </div>
         
   

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
$spamc=$row_blog['spamCount'];
$viewc=$row_blog['viewCount'];
    $timestamp=$row_blog['timeStamp'];
$line=explode("\n", $text);
$name=$line['0'];
$length=sizeof($line);
$i=1;
$description="";
for($i=1;$i<$length;$i++)
{$description.=$line[$i];

}
$id=$_SESSION['id'];
$get_rat="select * from spam where userID='$id' AND refNo='$blog_id'";
$run_rat=mysqli_query($con,$get_rat);
$count=mysqli_num_rows($run_rat);
while($row_rat=mysqli_fetch_array($run_rat))
{

  $your=$row_rat['spam'];
}




 $user="select * from user where userID='$userid'";
$run_user=mysqli_query($con,$user);
  while($row_user=mysqli_fetch_array($run_user))
  {$username=$row_user['username'];
$email=$row_user['emailID'];
if($count==0)
{
     echo "
<div id='movie_box' class='dashdiv' style='
    padding: 10px;
    margin-top:25px;
    text-align: center;
    width:600px;
    word-wrap: break-word;
    display: block;
    background-color: white;
    border: 2px solid grey;
    border-radius: 8px;
    margin-bottom: 40px;'>



<h2 font-size:150%>$name</h2>

<p>Description :<b>$description</b></p>
<p>Username:<b> $username</b></p>
<p>Email:<b> $email</b></p>
<form action='' method='post' enctype='multipart/form-data'>
<input type='submit' name='spam' value='Spam Blog'/>&nbsp&nbsp
<input type='submit' name='genuine' value='Genuine Blog'/>
</form>




";
echo "<br><i>(Can't change once reported)</i></div>";

if(isset($_POST['spam']))
{

$insert_rat="insert into spam(userID,refNo,spam) values ('$id','$blog_id','SPAM')";
$insert_rati= mysqli_query($con, $insert_rat);
$viewc=$viewc+1;
$spamc=$spamc+1;
$update_rating="update blog set spamCount='$spamc' where refNo='$blog_id'";
$run_update=mysqli_query($con,$update_rating);
$update_nor="update blog set viewCount='$viewc' where refNo='$blog_id'";
$run_update=mysqli_query($con,$update_nor);
if($insert_rati)
{
  echo "<script>alert('THANK YOU FOR YOUR REPORT!')</script>";
  echo "<script>window.open('view.php?blog_id=$blog_id','_self')</script>";
}


}
if(isset($_POST['genuine']))
{

$insert_rat="insert into spam(userID,refNo,spam) values ('$id','$blog_id','GENUINE')";
$insert_rati= mysqli_query($con, $insert_rat);
$viewc=$viewc+1;


$update_nor="update blog set viewCount='$viewc' where refNo='$blog_id'";
$run_update=mysqli_query($con,$update_nor);
if($insert_rati)
{
  echo "<script>alert('THANK YOU FOR YOUR REPORT!')</script>";
  echo "<script>window.open('view.php?blog_id=$blog_id','_self')</script>";
}


}



}
else
{


    echo "
<div id='movie_box' class='dashdiv' style='
    padding: 10px;
    margin-top:25px;
    text-align: center;
    width:600px;
    word-wrap: break-word;
    display: block;
    background-color: white;
    border: 2px solid grey;
    border-radius: 8px;
    margin-bottom: 40px;'>



<h2 font-size:150%>$name</h2>

<p>Description :<b>$description</b></p>
<p>Username:<b> $username</b></p>
<p>Email:<b> $email</b></p>
<p>Your Report :<b>$your Blog</b></p>


</div>

";













}



}

  }
}

  

?>





	<?php
  date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');
  $id=$_SESSION['id'];
if(isset($_GET['blog_id']))
  {$blog_id=$_GET['blog_id'];

$con=mysqli_connect("localhost","root","","lostnfound");
 

$i=1;

  
  $blog="select * from blog where refNo='$blog_id'";
  $run_blog=mysqli_query($con,$blog);
  while($row_blog=mysqli_fetch_array($run_blog))
  {
    $blog_id=$row_blog['refNo'];
    $ownerid=$row_blog['ownerID'];
    if($id==$ownerid)
    {
$get_cats="select distinct sender from message where refNo='$blog_id' and reciever='$ownerid' order by messageid desc";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
$sender=$row_cats['sender'];
$get_the="select  * from user where userID='$sender'";
$run_the=mysqli_query($con,$get_the);

while($row_the=mysqli_fetch_array($run_the))
  {
    $username=$row_the['username'];
$email=$row_the['emailID'];
echo "
<div id='movie_box' class='dashdiv' style='
    padding: 10px;
    margin-top:25px;
    text-align: center;
    width:600px;
    word-wrap: break-word;
    display: block;
    background-color: skyblue;
    border: 2px solid grey;
    border-radius: 8px;
    margin-bottom: 40px;'>



<h4 style='color:red; text-align:left;'>$username</h4>
<h4 style='color:brown; text-align:left;'>Email:  $email</h4>
<form action='message.php' method='post' enctype='multipart/form-data'>
 <input type='hidden' name='owner' value='$ownerid'>
 <input type='hidden' name='reciever' value='$sender'>
 <input type='hidden' name='blog_id' value='$blog_id'>
<textarea name='message' cols='60' rows='5'></textarea>&nbsp&nbsp
<input type='submit' name='reply' value='Reply'/>
</form>


";







$get_cat="select * from message where (refNo='$blog_id' and reciever='$ownerid' and sender='$sender') or (refNo='$blog_id' and reciever='$sender' and sender='$ownerid') order by messageid desc";
$run_cat=mysqli_query($con,$get_cat);

while($row_cat=mysqli_fetch_array($run_cat))

{
$send=$row_cat['sender'];
$text=$row_cat['text'];
$ti=$row_cat['timeStamp'];

if($send==$ownerid)
{
echo"<p style='color:green;'>replied ($ti) :<b>$text</b></p>";

}
else
{
echo"<p style='color:red;'>commented ($ti) :<b>$text</b></p>";

}


}

echo"</div>";





}

    }

}
    else if($id!=$ownerid)
    {
      echo "
<div id='movie_box' class='dashdiv' style='
    padding: 10px;
    margin-top:25px;
    text-align: center;
    width:600px;
    word-wrap: break-word;
    display: block;
    background-color: skyblue;
    border: 2px solid grey;
    border-radius: 8px;
    margin-bottom: 40px;'>




<form action='' method='post' enctype='multipart/form-data'>
<textarea name='message' cols='60' rows='5'></textarea>&nbsp&nbsp
<input type='submit' name='comment' value='Comment'/>
</form>


";
     $get_cat="select * from message where (refNo='$blog_id' and sender='$id') or (refNo='$blog_id' and reciever='$id') order by messageid desc";
$run_cat=mysqli_query($con,$get_cat);

while($row_cat=mysqli_fetch_array($run_cat))

{
$send=$row_cat['sender'];
$text=$row_cat['text'];
$ti=$row_cat['timeStamp'];

if($send==$id)
{
echo"<p style='color:green;'>commented ($ti) :<b>$text</b></p>";

}
else
{
echo"<p style='color:red;'>replied ($ti) :<b>$text</b></p>";

}


}

echo"</div>";
if(isset($_POST['comment']))
{
  $t=$_POST['message'];

$insert_mes="insert into message(timeStamp,sender,reciever,refNo,text) values ('$timestamp','$id','$ownerid','$blog_id','$t')";
$insert_mess= mysqli_query($con, $insert_mes);
if($insert_mess)
{
  echo "<script>alert('Message sent')</script>";
  echo "<script>window.open('view.php?blog_id=$blog_id','_self')</script>";
}

}


    }
  }
}



?>
</center>
	</body>
	</html>