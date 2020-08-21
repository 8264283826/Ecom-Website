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
  				<li>Registration</li>
  			</ul>
  			
  		</div> <!-- col-md-12 end -->
  		 <div class = "col-md-3"> <!--col-md-3 start -->
  		 	<?php
            include("includes/sidebar.php")
  		 	?>
  		 </div> <!--col-md-3 end -->
       <div class="col-md-9"><!--contact.php start -->
         <div class="box"><!-- box start -->
           <div class="box-header"><!-- box-header start -->
             <center>
               <h2>Customer Registration</h2>
               
             </center>
           </div><!-- box-header end-->
           <form action="customer_register.php" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <label>Customer Name</label>
               <input type="text" name="c_name" required="" class="form-control">
             </div>
             <div class="form-group">
               <label>Customer Email</label>
               <input type="text" name="c_email" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Customer Password</label>
               <input type="password" name="c_password" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Country</label>
               <input type="text" name="c_country" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>City</label>
               <input type="text" name="c_city" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Contact Number</label>
               <input type="text" name="c_contact" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Address</label>
               <input type="text" name="c_address" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Image</label>
               <input type="file" name="c_image" class="form-control" required="">
             </div>
             <div class="text-center">
               <button type="submit" name="submit" class="btn btn-primary">
                 <i class="fa fa-user-md"></i>Redister
               </button>
             </div>
           </form>
         </div><!-- box end -->
         </div> <!--contact.php col -md -9 end -->
       </div> <!--contact.php end -->


        </div><!--container  end-->
     
</div> <!--content end-->




 <?php
include("includes/footer.php");
 ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>



<?php
if(isset($_POST['submit'])){
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_password = $_POST['c_password'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];

  $c_image = $_FILES['c_image']['name']; 
  $c_tmp_image = $_FILES['c_image']['tmp_name'];
  $c_ip = getUserIP();

  move_uploaded_file($c_tmp_image, "customer/customer_img/$c_image"); 

  $insert_customer = "INSERT INTO customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) VALUES('{$c_name}','{$c_email}','{$c_password}','{$c_country}','{$c_city}','{$c_contact}','{$c_address}','{$c_image}','{$c_ip}')";

  $run_customer = mysqli_query($con,$insert_customer);
  $sel_cart = "SELECT * FROM cart WHERE ip_add = '$c_ip'";
  $run_cart = mysqli_query($con,$sel_cart)or die("Query fail");
   
  if(mysqli_num_rows($run_cart)>  0){
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('you have been registered succes')</script>";

    echo "<script>window.open('checkout.php','_self')</script>";
  }else{
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('you have been registered succes')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }

}


?>