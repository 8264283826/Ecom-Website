<?php
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('../login.php','_self')</script>";
}else{

?>

<?php
   $edit_id = $_GET['user_profile'];
   $get_admin = "SELECT * FROM  admins WHERE admin_id = {$edit_id}";
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

<div class="row"> <!--row start -->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class = "breadcrumb"><!--breadcrumb start -->
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Edit Profile
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
					<span>Edit Profile</span>
				</h3>
			</div><!--panel-heading end-->
			<div class="panel-body"><!--panel-body start -->
				<form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> <!-- form start -->
					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Name:</label>
						<div class="col-md-6">

						  <input type="text" name="user_name" class="form-control" required="" value="<?php echo $admin_name;?>">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Email</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_email" class="form-control" required="" value="<?php echo $admin_email;?>">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">
						User Password:</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_password" class="form-control" required="" value="<?php echo $admin_password;?>">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Country:</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_contry" class="form-control" required="" value="<?php echo $admin_country;?>">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Job:</label>
						<div class="col-md-6">
							
						 <input type='text' name="user_job" class="form-control" required="" value="<?php echo $admin_job;?>">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Contact:</label>
						<div class="col-md-6">
							
						 <input type='number' name="user_contact" class="form-control" required="" value="<?php echo $admin_contact;?>">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User About:</label>
						<div class="col-md-6">
							
						 <textarea type='text' name="user_about" class="form-control" rows="3">
						 	<?php echo $admin_about;?>
						 </textarea>
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">User Image:</label>
						<div class="col-md-6">
							
						 <input type='file' name="user_image" class="form-control" required="" >
					 <img src="admin_images/<?php echo $admin_image ?>" width='70px' height='70px'>
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<div class="col-md-3">
							
						</div>
						<div class="col-md-6">

						  <input type="submit" name="submit" class="btn btn-primary form-control" value="Update Profile">
						  
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
   $user_id = $_GET['user_profile'];

   $user_name = $_POST['user_name'];
   $user_email = $_POST['user_email']; 
   $user_password = $_POST['user_password']; 
   $user_contry = $_POST['user_email']; 
   $user_job = $_POST['user_job']; 
   $user_contact = $_POST['user_contact']; 
   $user_about = $_POST['user_about']; 
   $user_image = $_FILES['user_image']['name'];
   $user_image_tmp = $_FILES['user_image']['tmp_name']; 

    move_uploaded_file($user_image_tmp, "admin_images/$user_image");
   $update_user = "UPDATE admins SET  
         admin_name ='{$user_name}',admin_email='{$user_email}',admin_password='{$user_password}',admin_image='{$user_image}',admin_contact='{$user_contact}',admin_country='{$user_contry}',admin_job='{$user_job}',admin_about='{$user_about}'
         WHERE admin_id = {$user_id}"; 

  $run_user = mysqli_query($con,$update_user)or die('query fail:');
    if($run_user){
      echo "<script>alert('Your Profile Update successfully')</script>";
      echo "<script>window.open('index.php?dashboard','_self')</script>";
    } 
}

?>