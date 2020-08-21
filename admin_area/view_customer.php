<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<div class="row"> <!-- row start -->
	<div class="col-lg-12">
		<ol class="breadcrumb">
  		  <li class="active">
  		  	<i class="fa fa-dashboard"></i>Dashboard / View Product
  		  </li>
		</ol>
	</div>
</div> <!-- row end -->

<div class="row"><!-- row 2 start -->
  <div class="col-lg-8"><!-- col-lg-12 start -->
   <div class="panel panel-default"><!-- panel panel-default start -->
   	 <div class="panel-heading">
   	 	<h3 class="panel-title">
   	 		<i class="fa fa-money fa-fw"></i><span> View Product</span>
   	 	</h3>
   	 </div>
   	 <div class="panel-body">
   	 	<div class="table-responsive">
   	 		<table class="table table-bordered table-hover table-striped">
   	 			<thead>
   	 				<tr>
   	 					<th>Customer No:</th>
   	 					<th>Customer Name:</th>
   	 					<th>Customer Email:</th>
   	 					<th>Customer Image:</th>
   	 					
   	 					<th>Customer Country:</th>
   	 					<th>Customer City:</th>
   	 					<th>Customer Phone Number:</th>
   	 					<th>Customer Delete:</th>
   	 					
   	 					
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				<?php
   					$i=0;
   					$get_customer = "SELECT * FROM customers";
   					$run_customer = mysqli_query($con,$get_customer)or die("Query fail : product" );
   					while ($row = mysqli_fetch_array($run_customer)) {
   						$customer_id = $row['customer_id'];
   						$customer_name  = $row['customer_name'];
   						$customer_email = $row['customer_email'];
   						$customer_country = $row['customer_country'];
                     $customer_city = $row['customer_city'];

   						$customer_contact = $row['customer_contact'];
   						$customer_image = $row['customer_image'];
   						$i++;

   					
   	 				?>
   	 				<tr>
   	 					<td><?php echo $i; ?></td>
   	 					<td><?php echo $customer_name; ?></td>
                     <td><?php echo $customer_email; ?></td>

   	 					<td><img src="../customer/customer_img/<?php echo $customer_image; ?>"width= '50px' height = '40px'></td>
   	 					<td><?php echo $customer_country; ?></td>
   	 					<td><?php echo $customer_city; ?></td>
   	 					<td><?php echo $customer_contact; ?></td>
   	 					
   	 					<td>
   	 						<a href="index.php?delete_customer=<?php echo 
                            $customer_id; ?>">
   	 							<i class="fa fa-trash-o"> Delete</i>

   	 						</a>
   	 					</td>
   	 					

   	 					
   	 				</tr>
   	 			<?php }  ?>
   	 			</tbody>
   	 		</table>
   	 	</div>
   	 </div>
   </div> <!-- panel panel-default end -->
  </div> <!-- col-lg-12 end -->
</div><!-- row 2 end -->
<?php } ?>