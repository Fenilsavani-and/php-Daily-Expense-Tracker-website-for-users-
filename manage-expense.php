<?php  
session_start();
error_reporting(0);
include('dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

//code deletion
if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblexpense where ID='$rowid'");
if($query){
echo "<script>alert('Record successfully deleted');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Oops. Better Luck Next time..');</script>";

}

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Daily Expense Tracker || Manage Expense</title>
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
		<div class="panel-heading">Expense</div>
		<div class="panel-body">
			<p style="font-size:16px; color:skyblue" align="center"> <?php if($msg){
   			 echo $msg;
  			}  ?> 
			</p>
	<div class="col-md-12">
	<div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Expense Item</th>
                  <th>Expense Cost</th>
                  <th>Expense Date</th>
                  <th>Action</th>
                </tr>
              </thead>
<?php
$userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select * from tblexpense where UserId='$userid'");

$cnt=1;

while ($row=mysqli_fetch_array($ret)) {

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td> 
              
                  <td><?php  echo $row['ExpenseItem'];?></td>
                  <td><?php  echo $row['ExpenseCost'];?></td>
                  <td><?php  echo $row['ExpenseDate'];?></td>
                  <td><a href="manage-expense.php?delid=<?php echo $row['ID'];?>">Delete</a>  
                </tr>
<?php 
$cnt=$cnt+1;
}?>
               
              </tbody>
            </table>
          </div>
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