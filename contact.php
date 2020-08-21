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
  				<li>Contact Us</li>
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
               <h2>Contact US</h2>
               <p class="text-muted">If you have any questions, Please feel free to contact us, our customer service center is working for you 24/7.</p>
             </center>
           </div><!-- box-header end-->
           <form action="contact.php" method="post">
             <div class="form-group">
               <label>Name</label>
               <input type="text" name="name" required="" class="form-control">
             </div>
             <div class="form-group">
               <label>Email</label>
               <input type="text" name="email" class="form-control" required="">
             </div>
             <div class="form-group">
               <label>Subject</label>
               <input type="text" name="subject" class="form-control" required="">
             </div>
             <div class = "form-group">
               <label>Massage<label>
                <textarea class="form-control" name="massage"></textarea>
             </div>
             <div class="text-center">
               <button type="submit" name="submit" class="btn btn-primary">
                 <i class="fa fa-user-md"></i>Send massage
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
$senderName = $_POST['name'];
$senderEmail = $_POST['email'];
$senderSubject = $_POST['subject'];
$senderMassage = $_POST['massage'];
$receiverEmail = 'nayakravi333@gmail.com';
mail($receiverEmail,$senderName,$senderSubject,$senderMassage,
     $senderEmail);

//customer mail
$email = $_POST['email'];
$subject = 'Welcome To Website';
$msg = "I shall get you soon, Thanks for sending email";
$from = 'nayakravi826428@gmail.com';
mail($email,$subject,$msg,$from);
echo '<h2 align = "center">Your mail sent</h2>';


}
?>