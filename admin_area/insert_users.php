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
				Dashboard / Insert User 
			</li>
		</div><!--breadcrumb end --> 
	</div><!--col-lg-12 end -->
</div> <!--row end -->
<div class="row"><!--row start -->
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8"><!--col-lg-6 start -->
		<div class="panel panel-default"><!--panel panel-default start -->
			<div class="panel-heading"><!--panel-heading start -->
				<h3 class="panel-title">
					<i class="fa fa-money fa-w"></i>
					<span>Insert User</span>
				</h3>
			</div><!--panel-heading end-->
			<div class="panel-body"><!--panel-body start -->
				<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> <!-- form start -->
					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Name:</label>
						<div class="col-md-6">

						  <input type="text" name="user_name" class="form-control" required="">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Email</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_email" class="form-control" required="">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">
						User Password:</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_password" class="form-control" required="">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Country:</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_contry" class="form-control" required="">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Job:</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_job" class="form-control" required="">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Contact:</label>
						<div class="col-md-6">
							
						 <input type='number' name="user_contact" class="form-control" required="">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User About:</label>
						<div class="col-md-6">
							
						 <textarea type='text' name="user_about" class="form-control" rows="3"></textarea>
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Image:</label>
						<div class="col-md-6">
							
						 <input type='file' name="user_image" class="form-control" required="" >
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<div class="col-md-3">
							
						</div>
						<div class="col-md-6">

						  <input type="submit" name="submit" class="btn btn-primary form-control" value="Insert User">
						  
						</div>
					</div>  <!-- form-group end -->

				</form> <!-- form end -->
			</div>  <!--panel-body end -->
		</div><!--panel panel-default end -->
	</div><!--col-lg-6 end -->
</div><!--row end -->
<?php
}
?>

<?php
if(isset($_POST['submit'])){
	$user_name = $_POST['user_name'];
	$user_email  = $_POST['user_email'];
	$user_password  = $_POST['user_password'];
	$user_contry  = $_POST['user_contry'];
	$user_job  = $_POST['user_job'];
	$user_contact  = $_POST['user_contact'];
	$user_about  = $_POST['user_about'];
    $user_image   = $_FILES['user_image']['name']; 
	$temp_image =  $_FILES['user_image']['tmp_name'];
    //move_uploaded_file($user_image_tmp,'admin_images/$user_image');
       move_uploaded_file($temp_image, "admin_images/$user_image");
	 $insert_admin = "INSERT INTO  admins(admin_name,admin_email,admin_password,admin_image,admin_contact,admin_country,admin_job,admin_about) VALUES ('$user_name','$user_email','$user_password','$user_image','$user_contact','$user_contry','$user_job','$user_about')";
$run_admin = mysqli_query($con,$insert_admin)or die('query fail:insert');

	if($run_admin){
	echo "<script>alert('New Admin Insert Successfully')</script>";
    echo "<script>window.open('index.php?view_users','_self')</script>";
	}


}


?>