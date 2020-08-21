<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<?php
 if(isset($_GET['delete_payment'])){
 	$delete_id = $_GET['delete_payment'];
 	$delete_payment = "DELETE FROM payment WHERE payment_id= {$delete_id}";
 	$delete_run = mysqli_query($con,$delete_payment)or die("QUERY FAIL");
 	if($delete_run){
 	echo "<script>alert('Your Order has Detele');</script>";
 	echo "<script>window.open('index.php?view_payment','_self')</script>";
 	}
 }
?>
<?php } ?>  