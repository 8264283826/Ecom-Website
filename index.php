<?php
session_start();
$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
include("admin_area/functions/functions.php");
?>


<!DOCTYPE html>
<html>

<head>

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
    include("header.php");
    

	 ?>
	
   <div class="container" id = "slider">   <!-- container sidebar start -->
    <div class = "col-md-12"><!--col-md-12 div start-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel"> <!-- carousel slide start-->
    <!-- Indicators --> 
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
       <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">  <!-- carousel-inner start-->
      <?php
       $get_slider = "SELECT * FROM   slider LIMIT 0,1";
       $run = mysqli_query($con, $get_slider);
        while ($row = mysqli_fetch_array($run)) {
          $slider_name = $row['slider_name'];
          $slider_image = $row['slider_image'];
          echo  '<div class="item active">
               <img src="admin_area/slider_images/'.$slider_image.'" alt="Los Angeles">
               </div>';
        
        }

      ?>

      <?php
       $get_slider = "SELECT * FROM   slider LIMIT 1,3";
       $run = mysqli_query($con, $get_slider);
        while ($row = mysqli_fetch_array($run)) {
          $slider_name = $row['slider_name'];
          $slider_image = $row['slider_image'];
          echo  '<div class="item">
               <img src="admin_area/slider_images/'.$slider_image.'" alt="Los Angeles">
               </div>';
        
        }

      ?>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
 </div>  <!-- carousel slide end-->
</div><!--col-md-6 div end-->
  </div> <!-- container sidebar end -->
	
   <div id = "advantage"><!--advantage start -->
   	  <div class = "container"><!-- container start -->
   	  	<div class="same-hight-row"> <!-- same-hight-row start -->
   	  		<div class = "col-md-4"> <!-- col-md-4 start -->
   	  			<div class = "box same-height"><!-- box same-height start-->
   	  				<div class = "icon">
   	  					<i class = "fa fa-heart"></i>
   	  				</div>
   	  				<h3><a href="#">BEST PRICES</a></h3>
   	  				<p>	You can check all other sites about the prices and  than compare with us.</p>
   	  			</div> <!-- box same-height end-->
   	  		</div> <!-- col-md-4 end -->

   	  		<div class = "col-md-4"> <!-- col-md-4 start -->
   	  			<div class = "box same-height"><!-- box same-height start-->
   	  				<div class = "icon">
   	  					<i class = "fa fa-heart"></i>
   	  				</div>
   	  				<h3><a href="#">100% SATISFACTION GUARANTEED FROM US</a></h3>
   	  				<p>	free returns on everything for 3 months</p>
   	  			</div> <!-- box same-height end-->
   	  		</div> <!-- col-md-4 end -->
   	  		<div class = "col-md-4"> <!-- col-md-4 start -->
   	  			<div class = "box same-height"><!-- box same-height start-->
   	  				<div class = "icon">
   	  					<i class = "fa fa-heart"></i>
   	  				</div>
   	  				<h3><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
   	  				<p>	We are known to provide best possible service ever</p>
   	  			</div> <!-- box same-height end-->
   	  		</div> <!-- col-md-4 end -->
   	  		
   	  		
   	  	</div><!-- same-hight-row end -->
   	  	
   	  </div><!-- container end -->
   	
   </div><!--advantage end-->
  	
   <div id = "hotbox"><!-- hotbox start-->
   	<div class = "box"><!--box start -->
   		<div class = "container-fluid"><!-- container start-->
   			<div class = "col-md-12"><!-- col-md-12 start --> 
   				<h2>Latest this weeks</h2>
   				
   			</div><!--col-md-12 end  --->
   			
   		</div><!--container end -->
   		
   	</div><!-- box end -->
   	
   </div><!-- hotbox end-->
   

    <div id = "content" class="container">
      <div class="box"><!-- div container start -->
    	<div class = "row"><!-- row start -->
    		<?php
          getPro();
        ?>
    		
    	</div><!-- row end -->
    	</div>
    </div> <!-- div container end -->  
    


    <!-- footer start -->
    <?php

   include("includes/footer.php");
   
   ?>
    <!-- footer close -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</body>

</html>