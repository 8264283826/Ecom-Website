<?php
session_start();
$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");

if(!isset($_SESSION['customer_email'])){
	echo "<script>window.open('checkout.php','_self')</script>";
	//echo "<script>window.open('my_account.php?my_order','_self')</script>";
}else{
include("admin_area/functions/functions.php");
if(isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<title>E-Commerce Store</title>
	<!-- Latest compiled and minified CSS -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
 <?php
include("C:/wamp/www/ecom/header.php");

 ?>
  <div id = "content"><!-- content start -->
  	<div class = "container"><!--container start -->
  		<div class="col-md-12"><!-- col-md-12 start -->
  			<ul class="breadcrumb">
  				<li><a href="home.php">HOME</a></li>
  				<li>My Account</li>
  			</ul>
  			
  		</div> <!-- col-md-12 end -->
  		 <div class = "col-md-3"> <!--col-md-3 start -->
  		 	<?php
            include("customer/sidebar.php")
  		 	?>
  		 </div> <!--col-md-3 end -->	
           <div class="col-md-9"><!--col-md-9 start -->
           	<div class="box"><!--box start -->
           	 <h1 align="center">Please confirm your Payment</h1>
           	 <form action="cunform.php?order_id=<?php echo $order_id ?>"
                  method="POST" enctype="multipart/form-data">
           	 	<div class="form-group">
           	 		<label>Invoice Number</label>
           	 		<input type="text" class="form-control" name="invoice_number" required="">
           	 	</div>
           	 	<div class="form-group">
           	 		<label>Amount</label>
           	 		<input type="text" class="form-control" name="amount" required="">
           	 	</div>
           	 	<div class="form-group">
           	 		<label>Select Payment Mode</label>
           	 		<select class="form-control" name="Payment-Mode">
           	 			<option>Bank Transfer</option>
           	 			<option>paypal</option>
           	 			<option>payMoney</option>
           	 			<option>Paytm</option>

           	 		</select>
           	 	</div>
              <div class="form-group">
                <label>Transection Number</label>
                <input type="text" name="transection_num" required="">
              </div>
           	 	<div class="form-group">
           	 		<label>Payment Date</label>
           	 		<input type="date" class="form-control" name="date" required="">
           	 	</div>
           	 	<div class="text-center">
           	 		<button type="submit" name="cofirm_payment" class="btn btn-primary btn-lg">Cofirm Payment</button>
           	 	</div>
           	 </form>
  <?php

  $con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
if(isset($_POST['cofirm_payment'])){
  $update_id = $_GET['order_id']; 
  $invoice_id = $_POST['invoice_number'];
  $amount = $_POST['amount'];
  $payment_mode = $_POST['Payment-Mode'];
  $date = $_POST['date'];
  $transection_num = $_POST['transection_num'];
  $complate = "complete";
   $insert = "INSERT INTO payment(invoice_num,amount,payment_mode,tra_num,date) VALUES ($invoice_id,$amount,'$payment_mode',$transection_num,'$date')"; 
  
  
  $run_query = mysqli_query($con, $insert) or die("Query fail: for first");


 $update_q = "UPDATE customer_order SET  order_status='$complate' 
            WHERE order_id = $update_id";
  $run_insert1 = mysqli_query($con,$update_q);  

  echo "<script> alert('Your order has been received, Thanks');</script>";
 echo "<script>window.open('my_account.php?my_order','_self')</script>";
}



  ?>	
           	</div><!--box end -->
           </div><!--col-md-9 end -->
  		 	

  		    </div><!--container  end-->
     
</div> <!--content end-->



 <?php
include("includes/footer.php");
 ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>

<?php 

 } ?>