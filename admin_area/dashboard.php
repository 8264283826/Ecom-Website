<?php


if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row start -->
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol>
	</div>
</div>   <!-- row end-->

<div class="row">  <!--  2row start -->	 
	 <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 start -->
	 	<div class="panel panel-primary"> <!--panel panel-primary start -->
	 		<div class="panel-heading">  <!-- panel-heading start -->
	 			<div class="row"> <!-- row start -->
	 				<div class="col-xs-3">  <!-- col-xs-3 start -->
	 				<i class="fa fa-tasks fa-5x"></i>	
	 				</div> <!-- col-xs-3 end -->
	 				<div class="col-xs-9 text-right"><!-- col-xs-9 text-right start -->
	 				<div class="huge"><?php echo $count_pro; ?></div>	
	 				<div>Products</div>
	 				</div><!-- col-xs-9 text-right end -->

	 			</div> <!-- row end -->
	 		</div>  <!-- panel-heading end -->
	 		<a href="index.php?view_product">
	 			<div class="panel-footer"><!-- panel-footer start -->
	 			<span class="pull-left">View Details</span>	
	 			<span class="pull-right"><i class="fa fa-arrow-circle-right">
	 			</i></span>
	 			<div class="clearfix"></div>
	 			</div><!-- panel-footer end -->
	 		</a>
	 	</div> <!--panel panel-primary end -->
	 </div><!--col-lg-3 col-md-6 end-->

	 <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 start -->
	 	<div class="panel panel-green"> <!--panel panel-primary start -->
	 		<div class="panel-heading">  <!-- panel-heading start -->
	 			<div class="row"> <!-- row start -->
	 				<div class="col-xs-3">  <!-- col-xs-3 start -->
	 				<i class="fa fa-comment fa-5x"></i>	
	 				</div> <!-- col-xs-3 end -->
	 				<div class="col-xs-9 text-right"><!-- col-xs-9 text-right start -->
	 				<div class="huge"><?php echo $count_cust; ?></div>	
	 				<div>Customer</div>
	 				</div><!-- col-xs-9 text-right end -->

	 			</div> <!-- row end -->
	 		</div>  <!-- panel-heading end -->
	 		<a href="index.php?view_customer">
	 			<div class="panel-footer"><!-- panel-footer start -->
	 			<span class="pull-left">View Details</span>	
	 			<span class="pull-right"><i class="fa fa-arrow-circle-right">
	 			</i></span>
	 			<div class="clearfix"></div>
	 			</div><!-- panel-footer end -->
	 		</a>
	 	</div> <!--panel panel-primary end -->
	 </div><!--col-lg-3 col-md-6 end-->

	 <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 start -->
	 	<div class="panel panel-yellow"> <!--panel panel-yellow start -->
	 		<div class="panel-heading">  <!-- panel-heading start -->
	 			<div class="row"> <!-- row start -->
	 				<div class="col-xs-3">  <!-- col-xs-3 start -->
	 				<i class="fa fa-shopping-cart fa-5x"></i>	
	 				</div> <!-- col-xs-3 end -->
	 				<div class="col-xs-9 text-right"><!-- col-xs-9 text-right start -->
	 				<div class="huge"><?php echo $count_pro_cat; ?></div>	
	 				<div>Product Category</div>
	 				</div><!-- col-xs-9 text-right end -->

	 			</div> <!-- row end -->
	 		</div>  <!-- panel-heading end -->
	 		<a href="index.php?view_product_cat">
	 			<div class="panel-footer"><!-- panel-footer start -->
	 			<span class="pull-left">View Details</span>	
	 			<span class="pull-right"><i class="fa fa-arrow-circle-right">
	 			</i></span>
	 			<div class="clearfix"></div>
	 			</div><!-- panel-footer end -->
	 		</a>
	 	</div> <!--panel panel-yellow end -->
	 </div><!--col-lg-3 col-md-6 end-->

	  <div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 start -->
	 	<div class="panel panel-red"> <!--panel panel-red start -->
	 		<div class="panel-heading">  <!-- panel-heading start -->
	 			<div class="row"> <!-- row start -->
	 				<div class="col-xs-3">  <!-- col-xs-3 start -->
	 				<i class="fa fa-support fa-5x"></i>	
	 				</div> <!-- col-xs-3 end -->
	 				<div class="col-xs-9 text-right"><!-- col-xs-9 text-right start -->
	 				<div class="huge"><?php echo $count_order;?></div>	
	 				<div>Order</div>
	 				</div><!-- col-xs-9 text-right end -->

	 			</div> <!-- row end -->
	 		</div>  <!-- panel-heading end -->
	 		<a href="index.php?view_order">
	 			<div class="panel-footer"><!-- panel-footer start -->
	 			<span class="pull-left">View Details</span>	
	 			<span class="pull-right"><i class="fa fa-arrow-circle-right">
	 			</i></span>
	 			<div class="clearfix"></div>
	 			</div><!-- panel-footer end -->
	 		</a>
	 	</div> <!--panel panel-red end -->
	 </div><!--col-lg-3 col-md-6 end-->
</div>  <!-- 2row end -->

<div class="row"><!-- row3 start -->
 <div class="col-lg-8 col-md-7"><!-- col-lg-8 start -->
 	<div class="panel panel-primary"><!--panel panel-primary start -->
 		<div class="panel-heading"><!--panel-heading start -->
 			<h3 class="panel-title"><!-- panel-title start -->
 			  <i class="fa fa-money fa-fw"></i><span>New orders</span> 
 			</h3> <!-- panel-title end -->
 		</div><!--panel-heading end -->
 		<div class="panel-body"><!-- panel-body start -->
 			<div class="table-responsive"><!-- table-responsive  start -->
 				<table class="table table-striped table-bordered table-hover"><!-- table table-bordered table-hover table-striped start -->

 				
 				<thead><!--thead start --> 
 					<tr>
 						<th>Order No:</th>
 						<th>Customer Email:</th>
 						<th>Invoice No:</th>
 						<th>Product Id:</th>

 						<th>Total:</th>
 						<th>Date:</th>
 						<th>Status:</th>
 					</tr>
 				</thead><!--thead end --> 
 				<tbody><!-- tbody start -->
   					<?php
   					 $i = 0;
   					 $get_order = "SELECT * FROM customer_order ORDER BY 1 DESC LIMIT 0,5";
   					 $run_order = mysqli_query($con,$get_order)or die("Query fail :");
   					 while ($row_order = mysqli_fetch_array($run_order)) {
   					 	$order_id = $row_order['order_id'];
   					 	$customer_id = $row_order['customer_id']; 
   					 	$product_id   = $row_order['product_id'];

   					 	$invoice_no = $row_order['invoice_no'];
   					 	$qty = $row_order['qty'];
   					 	$size = $row_order['size'];
   					 	$order_status = $row_order['order_status'];
 						$i++;
   					 	$get_customer = "SELECT * FROM customers WHERE customer_id = $customer_id";
   					 	$run_customer = mysqli_query($con,$get_customer)or die('Query fail : customer');
   					 while($row_customer = mysqli_fetch_array($run_customer)){
   					 	$customer_email =$row_customer['customer_email'];

   					 	
   					?>

 					<tr>
 						<td><?php echo $i; ?></td>
 						<td><?php echo $customer_email; ?></td>
 						<td><?php echo $invoice_no; ?></td>
 						<td><?php echo $product_id; ?></td>
 						<td><?php echo $qty; ?></td>
 						<td><?php echo $size; ?></td>
 						<td><?php echo $order_status; ?></td>



 					</tr>
 					<?php

 				}
 			}
 			?>
 				</tbody>
 				</table><!-- table table-bordered table-hover table-striped end -->
 			</div> <!-- table-responsive  end -->
 			<div class="text-right"> <!--text-right start -->
 			  <a href="index.php?view_order">
 			  	View All Order
 			  	<i class="fa fa-arrow-circle-right"></i>
 			  </a>	
 			</div>  <!--text-right end -->
 		</div> <!-- panel-body end -->
 	</div> <!--panel panel-primary start -->
 </div> <!-- col-lg-8 end -->
<?php
   $email = $_SESSION['admin_email'];
   $get_admin = "SELECT * FROM  admins WHERE admin_email = '{$email}'";
   $run_admin= mysqli_query($con,$get_admin)or die('Query fail:edit');
  while ($row = mysqli_fetch_array($run_admin)) {
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_password = $row['admin_password'];
    $admin_contact = $row['admin_contact'];
    $admin_country = $row['admin_country'];
    $admin_job = $row['admin_job'];
    $admin_about = $row['admin_about'];
   $admin_image = $row['admin_image'];
               
    }
?>
 <div class=" col-lg-4 col-md-5"> <!--col-md-4 start -->
 	<div class="panel" style="background-color: #dde7e0 "> <!--panel start -->
 		<div class="panel-body" > <!--panel-body start -->
 			<div class="thumb-info mb-md" style="background-color:#a1badc "><!--thumb-info mb-md start -->
 			 <img src="admin_images/<?php echo $admin_image ?>" class="rounded img-responsive">
 			 <div class="thumb-info-title" style="margin-bottom: -12px"> <!-- thumb-info-title start -->
 			 	<span class="thumb-info-inner" style="color: blue">Admin Name: <?php echo $admin_name ?></span><br>
 			 	<span class="thumb-info-type" style="color: blue">Admin Job: <?php echo $admin_job?></span><br><br>

 			 </div>  <!-- thumb-info-title end -->
 			</div> <!--thumb-info mb-md end -->
 			<div class="mb-md" style="margin-top:-3px"> <!-- mb-md start -->
 			 <div class="widget-content-expanded" style="background-color: #a9d89a  "> <!--widget-content-expanded start -->
 			 	<i class="fa fa-user" style="color:blue"></i>
 			 	<span style="color: #0d0703"> Email:</span>  <?php echo $admin_email?> 
 			 	<br>
 			 	<i class="fa fa-user" style="color:blue"></i>
 			 	<span style="color: #0d0703"> Country:</span> <?php echo $admin_country?>
 			    <br>
 			 	<i class="fa fa-user" style="color:blue"></i>
 			 	<span style="color: #0d0703"> Contect:</span> <?php echo $admin_contact?> 
 			 </div>	 <!--widget-content-expanded end -->
 			 
 			 <div style="background-color:  #e5baa1 ">
 			 <h5 class="text-muted" style="color:  #000502 ">About</h5>
 			 <p style="background-color:  #e5baa1 ">
 			 	<?php echo $admin_about?>
 			 </p>
 			</div>
 			</div><!-- mb-md end -->
 		</div> <!--panel-body end -->
 	</div> <!--panel end -->
 </div> <!--col-md-4 end -->
</div><!-- row3 end -->


<?php
}

?>