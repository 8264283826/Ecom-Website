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
				Dashboard / Insert  Category 
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
					<span>Insert  Category</span>
				</h3>
			</div><!--panel-heading end-->
			<div class="panel-body"><!--panel-body start -->
				<form class="form-horizontal" action="" method="post"> <!-- form start -->
					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">Category Title</label>
						<div class="col-md-6">

						  <input type="text" name="p_cat_title" class="form-control">
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<label class="col-md-3 control-label">Category Description</label>
						<div class="col-md-6">
							
						 <textarea type='text' name="p_cat_desc" class="form-control"></textarea>
						  
						</div>
					</div>  <!-- form-group end -->

					<div class="form-group"> <!-- form-group start -->
						<div class="col-md-3">
							
						</div>
						<div class="col-md-6">

						  <input type="submit" name="submit" class="btn btn-primary form-control" value="Submit Now">
						  
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
	$cat_title = $_POST['p_cat_title'];
	$cat_desc  = $_POST['p_cat_desc'];

	$insert_cat = "INSERT INTO  categorys (cat_title,cat_desc) VALUES ('$cat_title','$cat_desc')";
	$run_cat = mysqli_query($con,$insert_cat)or die('query fail:insert');

	if($run_cat){
		echo "<script>alert('New Product Category Insert Successfully')</script>";
    	echo "<script>window.open('index.php?view_category','_self')</script>";
	}


}


?>