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
   	 					<th>Payment No:</th>
   	 					<th>Invoice No:</th>
   	 					<th>amount:</th>
   	 					<th>payment_mode :</th>
   	 					<th>Reference No:</th>
   	 					<th>Patment Date:</th>
   	 					<th> Delete Patment:</th>
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				<?php
   					$i=0;
   					$get_customer = "SELECT * FROM payment";
   					$run_customer = mysqli_query($con,$get_customer)or die("Query fail : product" );
   					while ($row = mysqli_fetch_array($run_customer)) {
   						$payment_id = $row['payment_id'];
              $invoice_num = $row['invoice_num'];
   					  $amount  = $row['amount'];
   						$payment_mode = $row['payment_mode'];
   						$tra_num = $row['tra_num'];
              $date = $row['date'];
   						$i++;

   					
   	 				?>
   	 				<tr>
   	 					<td><?php echo $i; ?></td>
   	 					<td style='background-color: yellow'><?php echo $invoice_num; ?></td>
              <td><?php echo $amount; ?></td>
   	 					<td><?php echo $payment_mode; ?></td>
   	 					<td><?php echo $tra_num; ?></td>
   	 					<td><?php echo $date; ?></td>
   	 					<td>
   	 						<a href="index.php?delete_payment=<?php echo 
                            $payment_id; ?>">
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