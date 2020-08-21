<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store</title>
	<!-- Latest compiled and minified CSS -->
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=" style.css">

</head>
<body>
	<div id="top"> <!-- top bar start -->
	   <div class="container">
		   <div class = "col-md-6 offer"><!-- 1col-md-6 start-->
			   <a href = "#" class="btn btn-success btn-sm">
			   Welcome Guest

			   </a>
				 <a href = "#">Shopping Cart Total Price: INR 100, Totol Items 2</a>
			
		   </div>  <!--col-md-6 end-->
	       <div class = "col-md-6 "><!--2col-md-6 start-->
		     <ul class = "menu">
			 <li>
			 <a href = "Customer_register.php">Register</a>
		
			 </li>
			 <li>
			 <a href = "checkout.php">My Account</a>
			 
			 </li>
			 <li>
			 <a href = "cart.php">Go to Cart</a>
			 
			 </li>
			 <li>
			 <a href = "login.php">Login</a>
			 
			 </li>
			 </ul>
		    
		   </div>
	
	</div> <!--container stop-->
    </div> <!-- top bar end-->    


	
	<div class = "navbar navbar-default" id = "navbar"><!--navbar start-->
	<div class= "container"><!--container start-->
	   <div class = "navbar-header"><!--navbar header start-->
	   <a  class = "navbar-brand home" href = "index.php">
	   <img src = "images/d1.png" alt = "teelogo" class = "hidden-xs">
	   <img src = "images/tea.png" alt = "teelogo" class = "visible-xs">
	   </a>
	 <button type="button" class="navbar-toggle" data-toggle= "collapse" 
	         data-target = "#navigation"> 	
	       <span class = "sr-only">Toggel Navigation</span>
		   <i class = "fa fa-align-justify"></i>
	    </button>
	   <button type ="button" class = "navbar-toggle" 
	         data-toggle = "collapse" data-target= "#search">
	        <span class = "sr-only"></span>
			 <i class = "fa fa-search"></i>
	   </button>
	</div><!--navbar header end-->   
	  
        <div class = "navbar-collapse collapse" id = "navigation"><!---navbar-collapse start-->
           <div class = "padding-nav"><!--pading nav start-->
		      <ul class = "nav navbar-nav navbar-left">
			   <li class = "active">
			    <a href = "index.php">HOME</a>
			   </li>
			  
			    <li class = " ">
			    <a href = "shop.php">Shop</a>
				</li>
			   
			    <li class = "">
			    <a href = "checout.php">My Account</a>
				</li>
			   
                  
			    <li class = "">
			    <a href = "cart.php">shoping cart</a>
				 </li>	
			  		  
			  
			  <li class = "">
			    <a href = "about.php">about us</a>
			  </li>
			   
			    
			  <li class = "">
			    <a href = "services.php">services</a>
			  </li>
			  
			    
			  <li class = "">
			    <a href = "contact.php">contact us</a>
			  </li>
			   
			  
			  </ul>
		  </div><!--pading nav end-->
		  <a href = "cart.php" class = "btn btn-primary  navbar-btn right">
			     <i class = "fa fa-shopping-cart"></i>
			     <span>4 Items In Cart</span>
					
			  </a>	
	  <div class = "navbar-collapse collapse-right"> <!--navbar-collapse collapse-right start--> 
		      <button class = "btn navbar-btn btn-primary" type = "button" 
		      data-toggle ="collapse" data-target="#search">
			                  
			        <span class = "sr-only">Toggel Search</span>
			        <i class = "fa fa-search"></i>
			  </button> 
             
		  </div> <!--navbar-collapse collapse-right end--> 
			
			<div class = "collapse clearfix " id = "search"  > <!-- collapse clearfix   start-->
           	   <form class = "navbar-form " method = "get" action = "result.php">
           	      <div class = "input-group">
           	      	 <input type="text" name="user_query" class = "form-control" placeholder="search" required="">
    					
           	      	 <button type="submit" value="search" name="search" class="btn btn-primary "><i class = "fa fa-search"></i>
           	      	  </button>
           	      </div> 
           	   </form>
			</div> <!--collapse clearfix end -->

	 </div><!---navbar-collapse end--> 

	</div> <!--container close-->
	
	</div><!-- navbar close-->
</body>
</html>