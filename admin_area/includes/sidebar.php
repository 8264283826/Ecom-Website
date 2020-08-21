<?php
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('../login.php','_self')</script>";
}else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top" style = 'background: black'>
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle = 'collapse' data-target = '.navbar-ex1-collapse'>
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
	</div>
	<ul class="nav navbar-right top-nav"> <!---nav navbar-right top-nav start -->
		<li class="dropdown"> 
			<a href="#" class="dropdown-toggle" data-toggle = 'dropdown'>
				<i class="fa fa-user"></i>  <?php echo $admin_name; ?>

			</a>
	<ul class="dropdown-menu"> <!-- dropdown-menu start -->
		
		<li>
			<a href="index.php?user_profile">
				<i class="fa fa-fw-user"></i>  profile
			</a>
		</li>
		<li>
			<a href="index.php?view_product">
				<i class="fa fa-fw-envelope"></i>  product
				<span class="badge"><?php  echo $count_pro; ?></span>
			</a>
		</li>
		<li>
			<a href="index.php?user_profile">
				<i class="fa fa-fw-users"></i>  customer
				<span class="badge"><?php echo $count_cust; ?></span>
			</a>
		</li>
		<li>
			<a href="index.php?pro_cat">
				<i class="fa fa-fw-gear"></i>  product categories
				<span class="badge"><?php  echo $count_pro_cat; ?></span>
			</a>
		</li>
		<li class="divider"></li> 
		<li>
			<a href="logout.php">Logout
				<i class="fa fa-fw fa-power-off"></i>
				
			</a>
		</li>	
		
	</ul><!-- dropdown-menu end -->
		</li>
	</ul> <!---nav navbar-right top-nav end -->
	<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse start -->
		<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav start -->
			<li>
				<a href="index.php?dashboard">
  				<i class="fa fa-fw fa-dashboard"></i>
				Dashboard</a>
			</li>
			<li>  <!-- li start -->
				<a href="#" data-toggle = 'collapse' data-target = '#products'>
					<i class="fa fa-fw fa-table"></i>
					Product
				</a><i class="fa fa-fw fa-caret-down" style="color:#000502 "></i>
			
			<ul class="collapse" id="products">
				<li>
					<a href="index.php?insert_product">Insert Product</a>
				</li>
				<li>
					<a href="index.php?view_product">View Product</a>
				</li> 

			</ul>
			</li><!-- li end -->
			<li>  <!-- li start -->
				<a href="#" data-toggle = 'collapse' data-target = '#products_cat'>
					<i class="fa fa-fw fa-table"></i>
					Product Category
				</a><i class="fa fa-fw fa-caret-down"  style="color:#000502"></i>
			
			<ul class="collapse" id="products_cat">
				<li>
					<a href="index.php?insert_product_cat">Insert Product Categorys</a>
				</li>
				<li>
					<a href="index.php?view_product_cat">View Categorys</a>
				</li> 

			</ul>
			</li><!-- li end -->
			<li>  <!-- li start -->
				<a href="#" data-toggle = 'collapse' data-target = '#category'>
					<i class="fa fa-fw fa-table"></i>
					Category
				</a><i class="fa fa-fw fa-caret-down" style="color:#000502"></i>
			
			<ul class="collapse" id="category">
				<li>
					<a href="index.php?insert_category">Insert category</a>
				</li>
				<li>
					<a href="index.php?view_category">View Category</a>
				</li> 

			</ul>
			</li><!-- li end -->
			<li>  <!-- li start -->
				<a href="#" data-toggle = 'collapse' data-target = '#slider'>
					<i class="fa fa-fw fa-table"></i>
					Slider
				</a><i class="fa fa-fw fa-caret-down" style="color:#000502"></i>
			
			<ul class="collapse" id="slider">
				<li>
					<a href="index.php?insert_slider">Insert slider</a>
				</li>
				<li>
					<a href="index.php?view_slider">View slider</a>
				</li> 

			</ul>
			</li><!-- li end -->
			<li>
				<a href="index.php?view_customer"><i class="fa fa-fw fa-edit"></i>View Costomer</a>
			</li>
			<li>
				<a href="index.php?view_order"><i class="fa fa-fw fa-list"></i>View Order</a>
			</li>
			<li>
				<a href="index.php?view_payment"><i class="fa fa-fw fa-pencil"></i>View Payment</a>
			</li>
			<li>  <!-- li start -->
				<a href="#" data-toggle = 'collapse' data-target = '#users'>
					<i class="fa fa-fw fa-table"></i>
					users
				</a><i class="fa fa-fw fa-caret-down" style="color:#000502"></i>
			
			<ul class="collapse" id="users">
				<li>
					<a href="index.php?insert_users">Insert users</a>
				</li>
				<li>
					<a href="index.php?view_users">View users</a>
				</li> 
				<li>
					<a href="index.php?user_profile=<?php echo 
					   $admin_id; ?>">Edit profile</a>
				</li>

			</ul>
			</li><!-- li end -->
		</ul>  <!-- nav navbar-nav side-nav end -->
	</div><!-- collapse navbar-collapse navbar-ex1-collapse end -->
	
</nav>

<?php

}

?>