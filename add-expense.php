<?php
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $userid=$_SESSION['detsuid'];
    $dateexpense=$_POST['dateexpense'];
    $item=$_POST['item'];
    $costitem=$_POST['costitem'];
    $query=mysqli_query($con, "insert into tblexpense(UserId,ExpenseDate,ExpenseItem,ExpenseCost) value('$userid','$dateexpense','$item','$costitem')");
if($query){
echo "<script>alert('Expense has been added');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}
  
}
  ?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Daily Expense Tracker || Add Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	
</head>
<body>
<?php include_once('header.php');?>
<?php include_once('sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
	</div>
		
	<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Expense</div>
		<div class="panel-body">
			<p style="font-size:16px; color:skyblue" align="center"> <?php if($msg){
    			echo $msg;
 			 }  ?>
			</p>
	<div class="col-md-12">
<form  method="post" action="">
	<div class="form-group">
		<label>Date of Expense</label>
		<input class="form-control" type="date" value="" name="dateexpense" required="true">
	</div>
	<div class="form-group">
		<label>Item</label>
		<input type="text" class="form-control" name="item" value="" required="true">
	</div>
								
	<div class="form-group">
		<label>Cost of Item</label>
		<input class="form-control" type="text" value="" required="true" name="costitem">
	</div>
																
	<div class="form-group has-success">
		<button type="submit" class="btn btn-primary" name="submit">Add</button>
	</div>
								
</form>
		</div>
		</div>
	</div>
	</div>
			
	</div>
	</div>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>
<?php }  ?>