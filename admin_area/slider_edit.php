<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>

<div class="row"> <!--row start -->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class = "breadcrumb"><!--breadcrumb start -->
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Edit Slider 
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
					<span>Edit Slider</span>
				</h3>
			</div><!--panel-heading end-->
			<?php
			$id = $_GET['slider_edit'];
            $select = "SELECT * FROM slider WHERE id = $id";
            $run = mysqli_query($con,$select)or die('query fail:edit');
            $row = mysqli_fetch_array($run);
            $name = $row['slider_name'];
            $image = $row['slider_image'];


			?>
			<div class="panel-body">
				<form class="form-horizontal" action = "" method="post" enctype ="multipart/form-data">
					<div class="form-group"><!-- form-group start -->
						<label class="col-md-3 control-label">Slider Name:
						</label>
						<input type="text" name="slider_name" class="form-control" required="" value="<?php echo $name ?>">
					</div> <!-- form-group end -->
					
					
					<div class="form-group"><!-- form-group start -->
						<label class="col-md-3 control-label">Slider Image:</label>
						<input type="file" name="slider_image" class="form-control" required="">
						<img src="slider_images/<?php echo $image ?>" width='50px' height='50px'>
					</div> <!-- form-group end -->
					
					
					<div class="form-group">
						<input type="submit" name="update" value="Update" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>  <!--panel panel-default end -->
	</div><!--col-lg-6 end -->
	<div class="col-md-2">
		
	</div>
	
</div> <!--row end -->
<?php

if(isset($_POST['update'])){
   $id = $_GET['slider_edit'];

   $slider_name = $_POST['slider_name'];
   $slider_image = $_FILES['slider_image']['name']; 
   $slider_image_tmp = $_FILES['slider_image']['tmp_name']; 
   move_uploaded_file($slider_image_tmp, 'slider_images/$slider_image');
   $update = "UPDATE slider SET  
         slider_name ='{$slider_name}',slider_image='{$slider_image}' 
         WHERE id = {$id}"; 

  $run = mysqli_query($con,$update)or die('query fail:');
    if($run){
      echo "<script>alert('Update slider successfully')</script>";
      echo "<script>window.open('index.php?view_slider','_self')</script>";
    } 
}

?>
<?php
}
?>

