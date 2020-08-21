<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Insert Slider</title>
	 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
	
</head>
<body>
<div class="row"> <!--row start -->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class = "breadcrumb"><!--breadcrumb start -->
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Insert Slider 
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
					<span>Insert Slider</span>
				</h3>
			</div><!--panel-heading end-->
			<div class="panel-body">
				<form class="form-horizontal" action = "" method="post" enctype ="multipart/form-data">
					<div class="form-group"><!-- form-group start -->
						<label class="col-md-3 control-label">Slider Name:
						</label>
						<input type="text" name="slider_name" class="form-control" required="">
					</div> <!-- form-group end -->
					
					
					<div class="form-group"><!-- form-group start -->
						<label class="col-md-3 control-label">Slider Image:</label>
						<input type="file" name="slider_image" class="form-control" required="">
					</div> <!-- form-group end -->
					
					
					<div class="form-group">
						<input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
					</div>
				</form>
			</div>
		</div>  <!--panel panel-default end -->
	</div><!--col-lg-6 end -->
	<div class="col-md-2">
		
	</div>
	
</div> <!--row end -->



</body>
</html>
<?php

}
?>

<?php
if(isset($_POST['submit'])){
	$slider_name = $_POST['slider_name'];
	$slider_image = $_FILES['slider_image']['name'];
	
	$temp_slider =  $_FILES['slider_image']['tmp_name'];

	$view_slider = 'SELECT * FROM slider';
	$view_run_slider=mysqli_query($con,$view_slider)or die('query slider fail');
	$count = mysqli_num_rows($view_run_slider);
	if($count < 4){
		move_uploaded_file($temp_slider, 'slider_images/$slider_image');
		$insert_slide = "INSERT INTO slider (slider_name,slider_image) VALUES
		   ('{$slider_name}','{$slider_image}')";
		$run_slide = mysqli_query($con,$insert_slide)or die('Query fail insert slider');
		if($run_slide){
		echo "<script>alert('New slider insert successflly')</script>";
		echo "<script>window.open('index.php?view_slider','_self')</script>";

		}
	}
   else{
   	echo "<script>alert('You have already inserted 4 slides.')</script>";
   }

}

?>