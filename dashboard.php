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
	
	<title>Daily Expense Tracker - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script src="js/respond.min.js"></script>
	
</head>
<body>
	
<?php include_once('header.php');?>
<?php include_once('sidebar.php');?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
	
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
	
		

<div class="col-xs-6 col-md-3">
<div class="panel panel-default">
<div class="panel-body easypiechart-panel">
<?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 

	<h4>Today's Expense</h4>
		<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_expense;?>" >
		<span class="percent"><?php if($sum_today_expense=="")
		{
		echo "0";
		}else 
		{
		echo $sum_today_expense;
		}

?>
		</span>
		</div>
</div>
</div>
</div>
<div class="col-xs-6 col-md-3">
<div class="panel panel-default">
<?php
//Yestreday Expense
$userid=$_SESSION['detsuid'];
$ydate=date('Y-m-d',strtotime("-1 days"));
$query1=mysqli_query($con,"select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
$result1=mysqli_fetch_array($query1);
$sum_yesterday_expense=$result1['yesterdayexpense'];
 ?> 
	<div class="panel-body easypiechart-panel">
		<h4>Yesterday's Expense</h4>
		<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_expense;?>" >
		<span class="percent"><?php if($sum_yesterday_expense=="")
		{
		echo "0";
		} else
		{
		echo $sum_yesterday_expense;
		}

?></div>
	  	</div>
	</div>
</div>
<div class="col-xs-6 col-md-3">
<div class="panel panel-default">
<?php
//Weekly Expense
$userid=$_SESSION['detsuid'];
$pastdate=  date("Y-m-d", strtotime("-1 week")); 
$crrntdte=date("Y-m-d");
$query2=mysqli_query($con,"select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
$result2=mysqli_fetch_array($query2);
$sum_weekly_expense=$result2['weeklyexpense'];
?>
	<div class="panel-body easypiechart-panel">
		<h4>Last 7day's Expense</h4>
		<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense;?>">
		<span class="percent"><?php if($sum_weekly_expense=="")
		{
		echo "0";
		} else 
		{
		echo $sum_weekly_expense;
		}
?>		</span>
	</div>
</div>
</div>
</div>
<div class="col-xs-6 col-md-3">
<div class="panel panel-default">
<?php
//Monthly Expense
$userid=$_SESSION['detsuid'];
$monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
$result3=mysqli_fetch_array($query3);
$sum_monthly_expense=$result3['monthlyexpense'];
 ?>
	<div class="panel-body easypiechart-panel">
		<h4>Last 30day's Expenses</h4>
		<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" >
		<span class="percent"><?php if($sum_monthly_expense=="")
		{
		echo "0";
		}else 
		{
		echo $sum_monthly_expense;
		}

?>		</span>
	</div>
</div>
</div>
</div>
		
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	
	
		
</body>
</html>
<?php } ?>