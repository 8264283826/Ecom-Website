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
  		  	<i class="fa fa-dashboard"></i>Dashboard / View Order
  		  </li>
		</ol>
	</div>
</div> <!-- row end -->

<div class="row"><!-- row 2 start -->
  <div class="col-lg-8"><!-- col-lg-12 start -->
   <div class="panel panel-default"><!-- panel panel-default start -->
   	 <div class="panel-heading">
   	 	<h3 class="panel-title">
   	 		<i class="fa fa-money fa-fw"></i><span> View Order</span>
   	 	</h3>
   	 </div>
   	 <div class="panel-body">
   	 	<div class="table-responsive">
   	 		<table class="table table-bordered table-hover table-striped">
   	 			<thead>
   	 				<tr>
   	 					<th>Order No:</th>
   	 					<th>Customer Name:</th>
   	 					<th>Customer Email:</th>
                     <th>Invoice No:</th>
   	 					<th>Product Title:</th>
   	 					
   	 					<th>Product Qty:</th>
   	 					<th>Product Size:</th>
   	 					<th>Total Amount:</th>
   	 					<th>Order Status:</th>
                     <th> Delete Order:</th>
   	 					
   	 					
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				<?php
   					$i=0;
   					$get_customer = "SELECT * FROM customer_order";
   					$run_customer = mysqli_query($con,$get_customer)or die("Query fail : product" );
   					while ($row = mysqli_fetch_array($run_customer)) {
   						$order_id = $row['order_id'];
                     $invoice_no = $row['invoice_no'];
                     
   					   $customer_id  = $row['customer_id'];
   						$product_id = $row['product_id'];
   						$due_amount = $row['due_amount'];
                     $qty = $row['qty'];

   						$size = $row['size'];
   						$order_date = $row['order_date'];
                     $order_status = $row['order_status'];

                  $select_cust = "SELECT * FROM customers  
                              WHERE customer_id = $customer_id";
                  $run_cust = mysqli_query($con,$select_cust)or die('query fail for select product');
                  $row_cust = mysqli_fetch_array($run_cust);
                 $customer_name  = $row_cust['customer_name'];  
                  $customer_email  = $row_cust['customer_email'];  



                   $select_pro = "SELECT * FROM products 
                            WHERE product_id = $product_id";
                  $run_pro = mysqli_query($con,$select_pro)or die('query fail for select product');
                  $row_pro = mysqli_fetch_array($run_pro);
                  $product_titel  = $row_pro['product_titel'];
   						$i++;

   					
   	 				?>
   	 				<tr>
   	 					<td><?php echo $i; ?></td>
   	 					<td><?php echo $customer_name; ?></td>
                     <td><?php echo $customer_email; ?></td>
                     <td style='background-color: yellow'><?php echo $invoice_no; ?></td>
   	 					<td><?php echo $product_titel; ?></td>
   	 					<td><?php echo $qty; ?></td>
   	 					<td><?php echo $size; ?></td>
                     <td>INR <?php echo $due_amount;?></td>
                     <td><?php echo $order_status; ?></td>
                     

   	 					
   	 					<td>
   	 						<a href="index.php?delete_order=<?php echo 
                            $order_id; ?>">
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