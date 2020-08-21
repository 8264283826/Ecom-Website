<div class="box">
	<center>
		<h1>Do you Really Want to Delete Your Account</h1>
	
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<input type="submit" name="yes" value="Yes, I Want To Delete" class="btn btn-danger">
		<input type="submit" name="no" value="No, I Don't Want" class="btn btn-primary">
	</form>
	</center>
</div>

<?php
$c_email = $_SESSION['customer_email'];
if(isset($_POST['yes'])){
	$delete = "DELETE FROM customers WHERE customer_email='$c_email'";
	$run_q = mysqli_query($con,$delete)or die('Query fail:Delete');
	if($run_q){
		session_destroy();
		echo "<script>alert('Your account has been delete')</script>";

		echo "<script>window.open('./index.php','_self')</script>";
	}
}


?>