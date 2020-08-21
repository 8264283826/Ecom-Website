<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<?php
 if(isset($_GET['delete_user'])){
 	$delete_id = $_GET['delete_user'];
 	$delete_admin = "DELETE FROM admins WHERE admin_id= {$delete_id}";
 	$delete_run = mysqli_query($con,$delete_admin)or die("QUERY FAIL");
 	if($delete_run){
 	echo "<script>alert('Admin Detele Successfully');</script>";
 	echo "<script>window.open('index.php?view_users','_self')</script>";
 	}
 }
?>
<?php } ?>  