	<div class="container" id = "footer">  <!-- footer start -->
       <div class = "container"><!-- contaioner start --->
			<div class = "row"><!-- container row start -->
				<div class = "col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 start-->
					<h4>Pages</h4>
					<ul>
						<li><a href="cart.php">Shopping cart</a></li>
						<li><a href="contect.php">Contact Us</a></li>
						<li><a href="shop.php">Shop</a></li>
						<li><a href="checkout.php">My Account</a></li>
					</ul>
					<hr>
					<h4>User Section</h4>
					<ul>
						<li><a href="checkout.php">Login</a></li>
						<li><a href="customer_registration.php">Register</a></li>
					</ul>
					<hr class = "hidden-md hidden-lg hidden-sm">
				</div><!-- col-md-3 col-sm-6 end-->
				

				 <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 start-->
				 	<h4>Top Product Categories</h4>
				 	<ul>
				 		<?php
				 		$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
				 		$get_p_cats = "SELECT * FROM  product_categorys";
				 		$run_p_cats = mysqli_query($con,$get_p_cats)or die("Query fail");
				 		while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
								$p_cat_id = $row_p_cats['p_cat_id'];
								$p_cat_title = $row_p_cats['p_cat_title'];
								$p_cat_desc = $row_p_cats['p_cat_desc'];

			echo "<li><a href ='shop.php?$p_cat_id'>$p_cat_title</a></li>";

       				 		}

				 		?>
				 	</ul>
				     <hr class = "hidden-md hidden-lg">

				 </div><!-- col-md-3 col-sm-6 end-->

                  <div class ="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
                     <h4>Where to find us</h4>
  						<p>
  							<strong>Teeshosting.com</strong>
  							<br>Sohawal
  							<br>Ayodhya
  							<br>utter pradesh
  							<br>nayakravi3333@gamil.com
  							<br>+91 8264283826
  						</p>
  						<a href="contact.php">Goto Contact us page</a>
  						<hr class = "hidden-lg hidden-md">
                  </div><!--col-md-3 col-sm-6 end-->
   					

   					<div class = "col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start-->
   						<h4>Get the news</h4>
   						<p class = "text-muted">Subscribe here for getting new icsrlab ayodhya</p>
   						<form action = "" method = "POST">
   							<div class = "input-group">
   								<input type = "text"  name = "email" class = "form-control">
   								<span class = "input-group-btn">
   									<input type="submit" class = "btn btn-default" value = "subscribe">
   								</span>
   							</div>
   							
   						</form>
   						<hr>
   						<h4>Stay In Touch</h4>
   						<p class = "social">
   							<a href="#"><i class = "fa fa-facebook"></i></a>
   							<a href="#"><i class = "fa fa-twitter"></i></a>
   							<a href="#"><i class = "fa fa-instagram"></i></a>
   							<a href="#"><i class = "fa fa-google-plus"></i></a>
   							<a href="#"><i class = "fa fa-envelope"></i></a>
   							
   						</p>
   					</div><!-- col-md-3 col-sm-6 end --> 
   					

			</div><!-- container row end -->       	
       </div><!-- contaioner end --->

	</div> <!-- footer end -->

     
	<div class="container" id = "copyright"><!-- copyright section start -->
		    <div class = "container">
			<div class = "col-md-6">
				<p class = "pull-left">&copy; 2020 Ms. Nayak Ravi</p>
			</div>
			<div class= "col-md-6">
				<p class = "pull-right">Tamplate By:<a href="www.Teeshosting.com">Teeshosting.com</a></p>
				
			</div>
			
		</div>
	</div><!-- copyright section end -->
		