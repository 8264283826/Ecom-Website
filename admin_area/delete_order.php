<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<?php
 if(isset($_GET['delete_order'])){
 	$delete_id = $_GET['delete_order'];
 	$delete_order = "DELETE FROM customer_order WHERE order_id= {$delete_id}";
 	$delete_run = mysqli_query($con,$delete_order)or die("QUERY FAIL");
 	if($delete_run){
 	echo "<script>alert('Your Order has Detele');</script>";
 	echo "<script>window.open('index.php?view_order','_self')</script>";
 	}
 }
?>
<?php } ?>  