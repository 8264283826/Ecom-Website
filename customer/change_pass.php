<div class = "box">
	<form action="<?php $_SERVER['PHP_SELF'];  ?>" method = 'post'>
	<center>
		<h2>Change Your Password</h2>
	</center>
	<div class="form-group">
		<label>Enter your Current Password</label>
		<input type="password" name="old_pass" class="form-control">
	</div>
	<div class="form-group">
		<label>Enter New Password</label>
		<input type="password" name="new_pass" class="form-control">
	</div>
	<div class="form-group">
		<label>Confirm New Password</label>
		<input type="password" name="c_n_pass" class="form-control">
	</div>
	<div class="text-center">
		<button class="btn btn-primary btn-lg" name="update" type="submit">Update Now</button>
	</div>
</form>
</div>


<?php
if(isset($_POST['update'])){
	$c_email = $_SESSION['customer_email'];
	$old_password = $_POST['old_pass'];
	$new_password = $_POST['new_pass'];
	$c_n_password = $_POST['c_n_pass'];
    $select_cust = "SELECT * FROM  customers WHERE customer_email='$c_email'"; 

    $run_q = mysqli_query($con,$select_cust)or die('Query fail:');
    $row = mysqli_fetch_array($run_q);
    $pass = $row['customer_pass'];
    $check_old_pass = mysql_num_rows($run_q);
    if($new_password == NULL){
    	echo "<script>alert('password  are required ... Try again')</script>";
    	exit();
    }
    if($old_password != $pass){
    	echo "<script>alert('Your current password is not vaild ... Try again')</script>";

    	exit();
    }else{
    
    	if($new_password != $c_n_password){
    		echo "<script>alert('Your new password is not match with confirm password.')</script>";
    		exit();
    	}else{
    		$update_q = "UPDATE customers SET customer_pass='$new_password' WHERE customer_email='$c_email'";
    		$run_up = mysqli_query($con,$update_q)or die('Update Query fail');
    		if($run_q){
    			echo "<script>alert('Your password successfully change')</script>";
    			echo "<script>window.open('my_account.php?my_order','_self')</script>";

    		}
    	}
    }
}


?>