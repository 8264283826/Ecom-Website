<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<?php
 if(isset($_GET['delete_p_cat'])){
 	$delete_id = $_GET['delete_p_cat'];
 	$delete_pro = "DELETE FROM product_categorys WHERE  p_cat_id= {$delete_id}";
 	$delete_run = mysqli_query($con,$delete_pro)or die("QUERY FAIL");
 	if($delete_run){
 	echo "<script>alert('Your product Category has Detele');</script>";
 	echo "<script>window.open('index.php?view_product_cat','_self')</script>";
 	}
 }
?>
<?php } ?>  