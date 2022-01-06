<?php
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Daily Expense Tracker || Datewise Expense Report</title>
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
	<div class="col-lg-12">
		<div class="panel panel-default">
		<div class="panel-heading">Datewise Expense Report</div>
			<div class="panel-body">
				<p style="font-size:16px; color:skyblue" align="center"> <?php if($msg){
    				echo $msg;
  				}  ?> 
				</p>
	<div class="col-md-12">
					
<form  method="post" action="expense-datewise-reports-detailed.php" name="bwdatesreport">
	<div class="form-group">
		<label>From Date</label>
		<input class="form-control" type="date"  id="fromdate" name="fromdate" required="true">
	</div>
	<div class="form-group">
		<label>To Date</label>
		<input class="form-control" type="date"  id="todate" name="todate" required="true">
	</div>
	<div class="form-group has-success">
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php } ?>