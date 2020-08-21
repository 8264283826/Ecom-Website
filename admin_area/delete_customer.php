<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<?php
 if(isset($_GET['delete_customer'])){
 	$delete_id = $_GET['delete_customer'];
 	$delete_pro = "DELETE FROM customers WHERE customer_id = {$delete_id}";
 	$delete_run = mysqli_query($con,$delete_pro)or die("QUERY FAIL");
 	if($delete_run){
 		echo "<script>alert('Customer has Detele');</script>";
 		echo "<script>window.open('index.php?view_customer','_self')</script>";
 	}
 }
?>
<?php } ?>