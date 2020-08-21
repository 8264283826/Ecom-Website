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
  <div class="col-lg-12"><!-- col-lg-12 start -->
   <div class="panel panel-default"><!-- panel panel-default start -->
   	 <div class="panel-heading">
   	 	<h3 class="panel-title">
   	 		<i class="fa fa-money fa-fw"></i> View Product
   	 	</h3>
   	 </div>
   	 <div class="panel-body">
   	 	<div class="table-responsive">
   	 		<table class="table table-bordered table-hover table-striped">
   	 			<thead>
   	 				<tr>
   	 					<th>Product Id</th>
   	 					<th>Product Title</th>
   	 					<th>Product image</th>
   	 					<th>Product Price</th>
   	 					
   	 					<th>Product Sold</th>
   	 					<th>Product Keyword</th>
   	 					<th>Product Date</th>
   	 					<th>Product Delete</th>
   	 					<th>Product Edit</th>
   	 					
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				<?php
   					$i=0;
   					$get_product = "SELECT * FROM products";
   					$run_product = mysqli_query($con,$get_product)or die("Query fail : product" );
   					while ($row = mysqli_fetch_array($run_product)) {
   						$product_id = $row['product_id'];
   						$product_titel  = $row['product_titel'];
   						$product_img1 = $row['product_img1'];
   						$product_price = $row['product_price'];
   						$product_keyword = $row['product_keyword'];
   						$date = $row['date'];
   						$i++;

   					
   	 				?>
   	 				<tr>
   	 					<td><?php echo $i; ?></td>
   	 					<td><?php echo $product_titel; ?></td>
   	 					<td><img src="product_images/<?php echo $product_img1; ?>"width= '50px' height = '40px'></td>
   	 					<td><?php echo $product_price; ?></td>
   	 					<td><?php echo $product_id; ?></td>
   	 					<td><?php echo $product_keyword; ?></td>
   	 					<td><?php echo $date ; ?></td>
   	 					<td>
   	 						<a href="index.php?delete_product=<?php echo $product_id; ?>">
   	 							<i class="fa fa-trash-o"> Delete</i>

   	 						</a>
   	 					</td>
   	 					<td>
   	 						<a href="index.php?edit_product=<?php echo $product_id; ?>">
   	 							<i class="fa fa-pencil"> Edit</i>

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