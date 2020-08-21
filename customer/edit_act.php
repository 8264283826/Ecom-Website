<?php

$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
 $customer_email = $_SESSION['customer_email'];
 $get_customer = "SELECT * FROM customers 
  WHERE customer_email = '$customer_email'";  
$run_customer = mysqli_query($con,$get_customer)or die("query fail");
if(mysqli_num_rows($run_customer)>0){
	while ($row_cunstomer = mysqli_fetch_array($run_customer)) {
		$customer_name    = $row_cunstomer['customer_name'];
		$customer_email   = $row_cunstomer['customer_email'];
		$customer_pass    = $row_cunstomer['customer_pass'];
		$customer_country = $row_cunstomer['customer_country'];
		$customer_city    = $row_cunstomer['customer_city'];
		$customer_contact = $row_cunstomer['customer_contact'];
		$customer_address = $row_cunstomer['customer_address'];
		$customer_image   = $row_cunstomer['customer_image'];
		$customer_ip      = $row_cunstomer['customer_ip'];
        $customer_id      = $row_cunstomer['customer_id'];

	}
}


?>




<div class="box">
	<center>
		<h1>
			Edit Your Account
		</h1>
	</center>
	<form action="my_account.php?edit_act" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Customer Name</label>
		<input type="text" name="c_name" class="form-control" required="" value="<?php echo $customer_name ?>">
	</div>
	<div class="form-group">
		<label>Customer Email</label>
		<input type="text" name="c_email" class="form-control" required="" value="<?php echo $customer_email ?>">
	</div>
	
	<div class="form-group">
		<label>Customer Country</label>
		<input type="text" name="c_country" class="form-control" required="" value="<?php echo $customer_country ?>">
	</div>
	<div class="form-group">
		<label>Customer City</label>
		<input type="text" name="c_city" class="form-control" required="" value="<?php echo $customer_city ?>">
	</div>
	<div class="form-group">
		<label>Customer Number</label>
		<input type="text" name="c_number" class="form-control" required="" value="<?php echo $customer_contact ?>">
	</div>
	<div class="form-group">
		<label>Customer Address</label>
		<input type="text" name="c_address" class="form-control" required="" value="<?php echo $customer_address ?>">
	</div>
	<div class="form-group">
		<label>Customer Image</label>
		<input type="file" name="c_image" class="form-control">
		<img src="customer/customer_img/<?php echo $customer_image; ?>" 
		   class="img-responsive"  height="100" width="100">
	</div>
	<div class="text-center">
		<button class="btn btn-primary" name = "update">Update Now</button>	
	</div>
</form>
</div>

<?php
if(isset($_POST['update'])){
	$update_id = $customer_id; 
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_number = $_POST['c_number'];
	$c_address = $_POST['c_address'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_temp = $_FILES['c_image']['tmp_name'];

  move_uploaded_file($c_image_temp,"customer/customer_img/$c_image");
 $update_customer = "UPDATE customers SET customer_name='{$c_name}',customer_email='{$c_email}',customer_country='{$c_country}',customer_city='{$c_city}',customer_contact = '{$c_number}',customer_address ='{$c_address}',customer_image='{$c_image}' WHERE 	customer_id='{$update_id}'"; 

   $run_customer = mysqli_query($con,$update_customer)or die('Query fail: Update query');
   if($run_customer){
   	echo "<script>alert('Your details Update.')</script>";

   	echo "<script>window.open('logout.php','_self')</script>";

   }
}


?>
