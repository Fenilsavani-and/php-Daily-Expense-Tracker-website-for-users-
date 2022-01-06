<?php
session_start();
include('dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } 
else
{
if(isset($_POST['submit']))
{
$userid=$_SESSION['detsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$userid' &&   Password='$cpassword'");
/* row ma actual user na id password avi gaya je niche data sathe compare karvama help karse*/
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Daily Expense Tracker || Change Password</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
<script>
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body>
<?php include_once('header.php');?>
<?php include_once('sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row"></div>
		<div class="row">
		<div class="col-lg-12">
			
				
	<div class="panel panel-default">
	<div class="panel-heading">Change Password</div>
		<div class="panel-body">
		<p style="font-size:16px; color:red" align="center"> <?php if($msg){
   		echo $msg;
  		}  ?> 
		</p>
	<div class="col-md-12">
<?php
$userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$userid'");

while ($row=mysqli_fetch_array($ret)) {

?>
<form  method="post" action="" name="changepassword" onsubmit="return checkpass();">
	<div class="form-group">
		<label>Current Password</label>
		<input type="password" name="currentpassword" class=" form-control" required= "true" value="">
	</div>
	<div class="form-group">
		<label>New Password</label>
		<input type="password" name="newpassword" class="form-control" value="" required="true">
	</div>
								
	<div class="form-group">
		<label>Confirm Password</label>
		<input type="password" name="confirmpassword" class="form-control" value="" required="true">
	</div>
								
	<div class="form-group has-success">
		<button type="submit" class="btn btn-primary" name="submit">Change</button>
	</div>
								
								
		</div>
<?php } ?>
</form>
		</div>
	</div>
	</div>
</div>
</div>
</div>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php }  ?>