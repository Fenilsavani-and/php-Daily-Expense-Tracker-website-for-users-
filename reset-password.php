<?php
session_start();
error_reporting(0);
include('dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbluser set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Daily Expense Tracker - Forgot Reset</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script type="text/javascript">
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
	<div class="row">
		<h2 align="center">Daily Expense Tracker</h2>
	<hr />
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">Rest Password</div>
		<div class="panel-body">
			<p style="font-size:16px; color:skyblue" align="center"> <?php if($msg)
			{
    			echo $msg;
  			}  ?> 
			</p>
<form  action="" method="post" name="changepassword" onsubmit="return checkpass()">
	<fieldset>
	<div class="form-group">
		<input class="form-control" placeholder="Password" name="newpassword" type="password" value="" required="true">
	</div>
							
	<div class="form-group">
		<input class="form-control" placeholder="Confirm Password" name="confirmpassword" type="password" value="" required="true">
	</div>
	<div class="checkbox">
		<button type="submit" value="" name="submit" class="btn btn-primary">Reset</button><span style="padding-left:250px"><a href="login.php" class="btn btn-primary">Login</a></span>

	</div>
						
	</fieldset>
</form>
	</div>
	</div>
	</div>
	</div>	
	

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
