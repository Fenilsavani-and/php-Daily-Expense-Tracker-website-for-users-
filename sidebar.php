<?php
session_start();
error_reporting(0);
include('dbconnection.php');
?>


<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
       <div class="profile-sidebar">
       <div class="profile-userpic">
            <img src="111.png" alt="">
       </div>
<div class="profile-usertitle">
<?php
$uid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"select FullName from tbluser where ID='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];

?>
       <div class="profile-usertitle-name"><?php echo $name; ?></div>
       <div class="profile-usertitle-status"><span class="indicator label-success"></span>Here</div>
       </div>

</div>
<div class="divider"></div>
   <ul class="nav menu">
      <li class="active"><a href="dashboard.php"> &nbsp;Dashboard</a></li>
            
      <li class="parent ">
	  <a data-toggle="collapse" href="#sub-item-1">
          &nbsp;Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"></span>
          </a>
          <ul class="children collapse" id="sub-item-1">
           	<li><a href="add-expense.php">Add Expenses </a></li>
                <li><a  href="manage-expense.php"> Manage Expenses </a></li>
                        
          </ul>

      </li>
           
      <li class="parent ">
		<a data-toggle="collapse" href="#sub-item-2">
                &nbsp;Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li>
		    <a class="" href="expense-datewise-reports.php">
                    &nbsp;Daywise Expenses
                    </a>
		    </li>
                   
                   
                </ul>
       </li>


<li><a href="user-profile.php">&nbsp;Profile</a></li>
<li><a href="change-password.php">&nbsp;Change Password</a></li>
<li><a href="logout.php">&nbsp;Logout</a></li>

   </ul>
 </div>