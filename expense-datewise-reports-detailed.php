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
		<div class="col-md-12">
					
<?php
$fdate=$_POST['fromdate'];
 $tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];
?>
	<h5 align="center" style="color:blue">Datewise Expense Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
	<hr />
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
               <thead>
                 <tr><tr>
              <th>S.NO</th>
              <th>Date</th>
              <th>Expense Amount</th>
                </tr> </tr>
               </thead>
<?php
$userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"SELECT ExpenseDate,SUM(ExpenseCost) as totaldaily FROM `tblexpense`  where (ExpenseDate BETWEEN '$fdate' and '$tdate') && (UserId='$userid') group by ExpenseDate");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            	  <td><?php  echo $row['ExpenseDate'];?></td>
                  <td><?php  echo $ttlsl=$row['totaldaily'];?></td>
           
           
                </tr>
                <?php
                $totalsexp+=$ttlsl; 
$cnt=$cnt+1;
}?>

 <tr>
  <th colspan="2" style="text-align:center">Final Total</th>     
  <td><?php echo $totalsexp;?></td>
 </tr>     

         </table>

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
<?php } ?>