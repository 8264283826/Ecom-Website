<div id="top"> <!-- top bar start -->
	   <div class="container">
		   <div class = "col-md-7 offer"><!-- 1col-md-6 start-->
			   <a href = "#" class="btn btn-success btn-sm">
			  <?php 
			  if(!isset($_SESSION['customer_email'])){
			  	echo "Welcome Gest";
			  }else{
			  	echo "Welcome: " .$_SESSION['customer_email']."";
			  }
			  ?>

			   </a>
				 <a href = "#">Shopping Cart Total Price: INR  <?php totalPrice(); ?>  Totol Items <?php item();  ?></a>
			
		   </div>  <!--col-md-6 end-->
	       <div class = "col-md-5 "><!--2col-md-6 start-->
		     <ul class = "menu">
			 <li>
			 <a href = "customer_register.php">Register</a>
		
			 </li>
			 <li>
			 	<?php
			 	if(!isset($_SESSION['customer_email'])){
			      echo "<a href = 'checkout.php'>My Account</a>";
			      
			 	}else{
			 		echo "<a href = 'my_account.php?my_order'>My Account</a>";
			 	}
			  
			  ?>
			 </li>
			 <li>
			 <a href = "cart.php">Go to Cart</a>
			 
			 </li>
			 <li>
			 <a href = "login.php"><?php
			 	if(!isset($_SESSION['customer_email'])){
			 		echo "<a href = 'checkout.php'>Login</a>";
			 	}else{
			 		echo "<a href = 'logout.php'>Logout</a>";
			 	}

			 	?>
			 </a>
			 
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
			    <a href = "my_account.php">My Account</a>
				</li>
			   
                  
			    <li class = "">
			    <a href = "cart.php">shopping cart</a>
				 </li>


			  <li class = "">
			    <a href = "contact.php">contact us</a>
			  </li>
			   
			  
			  </ul>
		  </div><!--pading nav end-->
		  <a href = "cart.php" class = "btn btn-primary  navbar-btn right">
			     <i class = "fa fa-shopping-cart"></i>
			     <span><?php item();  ?> Items In Cart</span>
					
			  </a>	
	  <div class = "navbar-collapse collapse right"> <!--navbar-collapse collapse-right start--> 
		      <button class = "btn navbar-btn btn-primary" type = "button" 
		      data-toggle ="collapse" data-target="#search">
			                  
			        <span class = "sr-only">Toggel Search</span>
			        <i class = "fa fa-search"></i>
			  </button> 
             
		  </div> <!--navbar-collapse collapse-right end--> 
			
			<div class = "collapse clearfix " id = "search"  > <!-- collapse clearfix   start-->
           	   <form class = "navbar-form " method = "get" action = "result.php">
           	      <div class = "input-group">
           	      	 <input type="text" name="user_query" class = "form-control" 
           	      	             placeholder="search" required="">
           	      	 <button type="submit" value="search" name="search" class="btn btn-primary "><i class = "fa fa-search"></i>
           	      	  </button>

           	      </div> 
           	   </form>
			</div> <!--collapse clearfix end -->

	 </div><!---navbar-collapse end--> 

	</div> <!--container close-->

	</div><!-- navbar close-->