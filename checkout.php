<?php
session_start();
include("admin_area/functions/functions.php");
$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<title>E-Commerce Store</title>
	<!-- Latest compiled and minified CSS -->
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=" style.css">

</head>
<body>
 <?php
include("header.php");
 ?>
  <div id = "content"><!-- content start -->
  	<div class = "container"><!--container start -->
  		<div class="col-md-12"><!-- col-md-12 start -->
  			<ul class="breadcrumb">
  				<li><a href="home.php">HOME</a></li>
  				<li>Checkout</li>
  			</ul>
  			
  		</div> <!-- col-md-12 end -->
  		 <div class = "col-md-3"> <!--col-md-3 start -->
  		 	<?php
            include("includes/sidebar.php")
  		 	?>
  		 </div> <!--col-md-3 end -->
      <div class="col-md-9"><!--col-md-9 start -->
        <?php
          if(!isset($_SESSION['customer_email'])){
            include('customer/customer_login.php');
          }else{
            include('payment_options.php');
          }
        ?>
      </div><!--col-md-9 end -->


         </div><!--container  end-->
     
</div> <!--content end-->




 <?php
include("includes/footer.php");
 ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>
