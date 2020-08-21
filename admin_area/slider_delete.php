<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<?php
 if(isset($_GET['slider_delete'])){
 	$delete_id = $_GET['slider_delete'];
 	$delete_pro = "DELETE FROM slider WHERE id = {$delete_id}";
 	$delete_run = mysqli_query($con,$delete_pro)or die("QUERY FAIL");
 	if($delete_run){
 		echo "<script>alert('Your Slider has Detele');</script>";
 		echo "<script>window.open('index.php?view_slider','_self')</script>";
 	}
 }
?>
<?php } ?>