<?php
session_start();
if(!isset($_SESSION['customer_email'])){
	echo "<script>window.open('checkout.php','_self')</script>";
	//echo "<script>window.open('my_account.php?my_order','_self')</script>";
}else{
include("admin_area/functions/functions.php");

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
    <link rel="stylesheet" type="text/css" href="./style.css">

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
           
  		 	<div class="col-md-9"><!-- col-md-9 start -->
	   		<!-- includeing my_order.php file  start-->
	   		<?php
             if(isset($_GET['my_order'])){
      	     include("customer/my_order.php");
             }

	         ?>
	         <!-- includeing my_order.php file  end -->

	         <!-- includeing Payoffline.php page start -->
	         <?php
	         if(isset($_GET['pay_offline'])){
	         	include("customer/pay_offline.php");	
	         }

	         ?>
	          <!-- includeing Payoffline.php page end -->   
	           <!-- edit_act.php page start -->
	           	<?php
	           	if(isset($_GET['edit_act'])){
	           		include("customer/edit_act.php");
	           	}
	           	?>
	           <!-- edit_act.php page end -->
	            <!-- change_pass.php page start -->
	            <?php
            		if(isset($_GET['change_pass'])){
            			include("customer/change_pass.php");
            		}

	            ?>
	             <!-- change_pass.php page end -->

	             <!-- edit_act.php page start-->
	             <?php
    				if(isset($_GET['delete_act'])){
    					include ("customer/delete_act.php");
    				}
	             ?>

	            <!-- change_pass.php page end -->

            </div>


  		    </div><!--container  end-->
     
</div> <!--content end-->



 <?php
include("includes/footer.php");
 ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>

<?php  } ?>