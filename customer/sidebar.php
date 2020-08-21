<div class="panel panel-default sidebar-menu"> <!-- panel panel-default sidebar-menu start -->
	<div class="panel-heading"><!--panel-heading start -->
		<?php
		$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
		$session_customer = $_SESSION['customer_email'];
		$get_cust = "SELECT * FROM customers 
		      WHERE customer_email = '$session_customer'";
		$run_cust = mysqli_query($con,$get_cust);
		$row_customer = mysqli_fetch_array($run_cust);
		$customer_image = $row_customer['customer_image'];
		$customer_name = $row_customer['customer_name'];
		if(!isset($_SESSION['customer_email'])){

		}else{
			echo "<center>
 			<img src='customer/customer_img/$customer_image' class='img-responsive'>
		</center>
		<br>
		<h3 align='center' class='panel-titel'>Name: $customer_name</h3>";
		}
		?>


		
		
	</div> <!--panel-heading end -->
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if(isset($_GET['my_order'])){echo 'active';} ?>">
				<a href="my_account.php?my_order"><i class="fa fa-list"></i> My Order</a>
			</li>
			<li class="<?php  if(isset($_GET['pay_offline'])){echo 'active';} ?>">
				<a href="my_account.php?pay_offline">
				<i class="fa fa-bolt"></i> Pay Offline
				</a>
			</li>
			<li class="<?php  if(isset($_GET['my_address'])){echo 'active';} ?>">
				<a href="my_account.php?my_address">
				<i class="fa fa-user"></i> My Address
				</a>
			</li>
			<li class="<?php  if(isset($_GET['edit_act'])){echo 'active';} ?>">
				<a href="my_account.php?edit_act">
				<i class="fa fa-pencil"></i> Edit Account
				</a>
			</li>
			<li class="<?php  if(isset($_GET['change_pass'])){echo 'active';} ?>">
				<a href="my_account.php?change_pass">
				<i class="fa fa-user"></i> Change Password
				</a>
			</li>
			<li class="<?php  if(isset($_GET['my_wishlist'])){echo 'active';} ?>">
				<a href="my_account.php?my_wishlist">
				<i class="fa fa-heart"></i> My Wishlist
				</a>
			</li>
			<li class="<?php  if(isset($_GET['delete_act'])){echo 'active';} ?>">
				<a href="my_account.php?delete_act">
				<i class="fa fa-trash"></i> Delete Account
				</a>
			</li>
			<li class="<?php  if(isset($_GET['logout'])){echo 'active';} ?>">
				<a href="my_account.php?logout">
				<i class="fa fa-sign-out"></i> Logout
				</a>
			</li>
		</ul>

	</div>
</div><!--panel panel-default sidebar-menu end -->