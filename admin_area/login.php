<?php
session_start();
include('includes/db.php');

?>


<!DOCTYPE HTML>
<html>
<head>
	<title>
		Admin Login
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	
	<div class="container"><!--container start -->
		<form class="form-login" action="" method="post"><!-- login form start -->
			<h2 class="form-login-heading">Admin Login</h2>
			<input type="text" name="admin_email" class="form-control" placeholder="Email Address" required="">
			<input type="password" name="admin_pass" class="form-control" placeholder="Password" required="">
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">Log In</button>
			<h4 class="forgot-password">
				<a href="forgot_password.php">Lost your Password? Forget Password</a>
			</h4>
		</form><!-- login form end -->
	</div><!--container end -->
    
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
	$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
	$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_admin  = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_password='$admin_pass'"; 
    $run_admin  = mysqli_query($con,$get_admin)or die('query fail');
    $count_admin = mysqli_num_rows($run_admin); 
    if($count_admin>0){
     $_SESSION['admin_email'] = $admin_email;
     echo "<script>alert('Your are log in');</script>";
     echo "<script>window.open('index.php?dashboard','_self');</script>";
    }
    else
    {
     echo "<script>alert('Email/password Wrong.');</script>";
    	
    }
}

?>