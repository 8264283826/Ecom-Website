<?php
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('../login.php','_self')</script>";
}else{

?>
<div class="row"> <!--row start -->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class = "breadcrumb"><!--breadcrumb start -->
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / View Product Category 
			</li>
		</div><!--breadcrumb end --> 
	</div><!--col-lg-12 end -->
</div> <!--row end -->
<div class="row"><!-- row 2 start -->
  <div class="col-lg-12"><!-- col-lg-12 start -->
   <div class="panel panel-default"><!-- panel panel-default start -->
   	 <div class="panel-heading"><!--panel-heading start -->
   	 	<h3 class="panel-title">
   	 		<i class="fa fa-money fa-fw"></i> View Product Category
   	 	</h3>
   	 </div>  <!--panel-heading end -->
   	 <div class="panel-body"> <!-- panel-body start -->
   	 	<div class="table-responsive"><!-- table-responsive start -->
   	 		<table class="table table-bordered table-hover table-striped">   <!--  table start -->
   	 			<thead><!-- thead start -->
   	 				<tr>
   	 					<th>Product Category Id</th>
   	 					<th>Product Category Title</th>
   	 					<th>Product Category Description</th>
   	 					
   	 					<th>Delete Product Category</th>
   	 					<th>Edit Product Category</th>
   	 					
   	 				</tr>
   	 			</thead> <!-- thead end -->
   	 			<tbody> <!-- tbody start -->
   	 				<?php
   	 				$i = 0;
   	 				$get_p_cats = "SELECT * FROM product_categorys";
   	 				$run_p_cats = mysqli_query($con,$get_p_cats)or die('Query fail : view product');
   	 				while ($row = mysqli_fetch_array($run_p_cats)) {
   	 					$p_cat_id = $row['p_cat_id'];
   	 					$p_cat_title = $row['p_cat_title'];
   	 					$p_cat_desc = $row['p_cat_desc'];
                        $i++;
   	 				

   	 				?>
   	 				
   	 				<tr>
   	 					<td><?php echo $i ?></td>
   	 					<td><?php echo $p_cat_title ?></td>
   	 					<td><?php echo $p_cat_desc ?></td>
   	 					
   	 					<td>
   	 						<a href="index.php?delete_p_cat=<?php echo $p_cat_id ?>">
   	 							<i class="fa fa-trash-o"> Delete</i>

   	 						</a>
   	 					</td>
   	 					<td>
   	 						<a href="index.php?edit_p_cat=<?php echo $p_cat_id ?>">
   	 							<i class="fa fa-pencil"> Edit</i>

   	 						</a>
   	 					</td>

   	 					
   	 				</tr>
   	 				<?php
   	 			    }
   	 			    ?>
   	 			
   	 			</tbody> <!-- tbody end -->
   	 		</table> <!--  table end -->
   	 	</div>  <!-- table-responsive end -->
   	 </div> <!-- panel-body end -->
   </div> <!-- panel panel-default end -->
  </div> <!-- col-lg-12 end -->
</div><!-- row 2 end -->


<?php
}
?>