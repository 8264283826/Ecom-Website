<div class="box">
	<div class="box-header">
		<center>
			<h2>Login</h2>
			<p class="lead">Already our customer</p>
		</center>

	</div>
	<form action="checkout.php" method="POST">
		<div class="form-group">
			<label>Email:</label>
			<input type="text" class="form-control" name="c_email" required="">
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password" class="form-control" name="c_password" required="">
		</div>
		<div class="text-center">
			<button name="login" value="Login" class="btn btn-primary">
				<i class="fa fa-sign-in"></i> Log In
			</button>
		</div>
	</form>
	<center>
		<a href="customer_register.php">
			<h3>New ? Register Now</h3>
		</a>
	</center>
</div>


<?php
if(isset($_POST['login'])){
	$customer_email = $_POST['c_email'];
	$customer_password = $_POST['c_password'];
	$select_customer = "SELECT * FROM customers 
	       WHERE customer_email = '$customer_email'
	       AND customer_pass='$customer_password'";
	$run_cust = mysqli_query($con,$select_customer)or die("Query fail");
	$get_ip = getUserIP();
	$check_customer = mysqli_num_rows($run_cust);
	$select_cart = "SELECT * FROM cart WHERE ip_add = '$get_ip'";
	$run_cart = mysqli_query($con,$select_cart)or die("Query fail");
	$check_cart = mysqli_num_rows($run_cart);
	if($check_customer == 0){
		echo "<script>alert('password/Email Wrong')</script>";
		exit();
	}
	if($check_customer == 1 AND $check_cart == 0){
     $_SESSION['customer_email'] = $customer_email;
     echo "<script>alert('Your are logged in')</script>";
     echo "<script>window.open('my_account.php','_self')</script>";

	}else{
		$_SESSION['customer_email'] = $customer_email;
    // echo "<script>alert('Your are logged in')</script>";
     echo "<script>window.open('checkout.php','_self')</script>";
	}


}


?>