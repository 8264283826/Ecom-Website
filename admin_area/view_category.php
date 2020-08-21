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
   	 					<th> Category Id:</th>
   	 					<th> Category Title:</th>
   	 					<th> Category Description:</th>
   	 					
   	 					<th>Delete  Category:</th>
   	 					<th>Edit  Category:</th>
   	 					
   	 				</tr>
   	 			</thead> <!-- thead end -->
   	 			<tbody> <!-- tbody start -->
   	 				<?php
   	 				$i = 0;
   	 				$get_cats = "SELECT * FROM categorys";
   	 				$run_cats = mysqli_query($con,$get_cats)or die('Query fail : view product');
   	 				while ($row = mysqli_fetch_array($run_cats)) {
   	 					$cat_id = $row['cat_id'];
   	 					$cat_title = $row['cat_title'];
   	 					$cat_desc = $row['cat_desc'];
                        $i++;
   	 				

   	 				?>
   	 				
   	 				<tr>
   	 					<td><?php echo $i ?></td>
   	 					<td><?php echo $cat_title ?></td>
   	 					<td><?php echo $cat_desc ?></td>
   	 					
   	 					<td>
   	 						<a href="index.php?delete_cat=<?php echo $cat_id ?>">
   	 							<i class="fa fa-trash-o"> Delete</i>

   	 						</a>
   	 					</td>
   	 					<td>
   	 						<a href="index.php?edit_cat=<?php echo $cat_id ?>">
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