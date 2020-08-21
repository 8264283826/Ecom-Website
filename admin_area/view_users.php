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
  		  	<i class="fa fa-dashboard"></i>Dashboard / View User
  		  </li>
		</ol>
	</div>
</div> <!-- row end -->

<div class="row"><!-- row 2 start -->
  <div class="col-lg-12"><!-- col-lg-12 start -->
   <div class="panel panel-default"><!-- panel panel-default start -->
   	 <div class="panel-heading">
   	 	<h3 class="panel-title">
   	 		<i class="fa fa-money fa-fw"></i> View User
   	 	</h3>
   	 </div>
   	 <div class="panel-body">
   	 	<div class="table-responsive">
   	 		<table class="table table-bordered table-hover table-striped">
   	 			<thead>
   	 				<tr>
   	 					<th>User Name:</th>
   	 					<th>User Email:</th>
   	 					<th>User Image:</th>
                     <th>User Contact:</th>
   	 					<th>User Country:</th>
   	 					<th>User Job:</th>
   	 					<th>Delete User:</th>
   	 				</tr>
   	 			</thead>
   	 			<tbody>
   	 				<?php
   					$i=0;
   					$get_admin = "SELECT * FROM admins";
   					$run_admin = mysqli_query($con,$get_admin)or die("Query fail : admin" );
   					while ($row = mysqli_fetch_array($run_admin)) {
   						$admin_id = $row['admin_id'];
   						$admin_name  = $row['admin_name'];
   						$admin_email = $row['admin_email'];
   						
   						$admin_image = $row['admin_image'];
   						$admin_contact = $row['admin_contact'];
                     $admin_country = $row['admin_country'];
                     $admin_job = $row['admin_job'];
   						$i++;

   					
   	 				?>
   	 				<tr>
   	 					<td><?php echo $i; ?></td>
   	 					<td><?php echo $admin_name; ?></td>
                     <td><?php echo $admin_email; ?></td>
   	 					<td><img src="admin_images/<?php echo $admin_image; ?>"width= '50px' height = '40px'></td>
   	 					
   	 					<td><?php echo $admin_contact; ?></td>
   	 					<td><?php echo $admin_country; ?></td>
   	 					<td><?php echo $admin_job ; ?></td>
   	 					<td>
   	 						<a href="index.php?delete_user=<?php echo $admin_id; ?>">
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