<?php

include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Insert Product</title>
	
    <script>tinymce.init({selector:'textarea'});</script>
	
</head>
<body>
<div class="row"> <!--row start -->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class = "breadcrumb"><!--breadcrumb start -->
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Insert Product 
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
					<span>Insert Product</span>
				</h3>
			</div><!--panel-heading end-->
			<div class="panel-body">
				<form class="form-horizontal" action = "" method="post" enctype ="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Product Title</label>
						<input type="text" name="product_title" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Category</label>
						<select name="product_cat" class="form-control">
							<option >Select a propduct category</option>
							<?php
                             
                            $get_p_cats = "SELECT * FROM product_categorys";
                            $run_p_cats = mysqli_query($con,$get_p_cats)or die("Query fail");
                             while ($row = mysqli_fetch_array($run_p_cats)) {
                              	$id = $row['p_cat_id'];
                              	$cat_title = $row['p_cat_title'];
                              	echo '<option value = "'.$id.'">'.$cat_title.'</option>';
                              } 

							?>
						</select>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Categories</label>
						<select name="cat" class="form-control">
							<option >Select a categories</option>
							<?php
                             
                            $get_cats = "SELECT * FROM categorys";
                            $run_cats = mysqli_query($con,$get_cats)or die("Query fail");
                             while ($row = mysqli_fetch_array($run_cats)) {
                              	$id = $row['cat_id'];
                              	$cat_title = $row['cat_title'];
                              	echo '<option value = "'.$id.'">'.$cat_title.'</option>';
                              } 

							?>
						</select>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Image 1</label>
						<input type="file" name="product_image1" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Image 2</label>
						<input type="file" name="product_image2" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Image 3</label>
						<input type="file" name="product_image3" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Price</label>
						<input type="text" name="product_price" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Keyword</label>
						<input type="text" name="product_keyword" class="form-control" required="">
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Description</label>
						<textarea name="product_desc" class="form-control" rows="6" cols="19">
						</textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
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
	$product_title   = $_POST['product_title'];
	$product_cat     = $_POST['product_cat'];
	$categories      = $_POST['cat'];
	$product_price   = $_POST['product_price'];
	$product_keyword = $_POST['product_keyword'];
	$product_desc    = $_POST['product_desc'];
	

	$product_img1   = $_FILES['product_image1']['name'];
	$product_img2   = $_FILES['product_image2']['name'];
	$product_img3   = $_FILES['product_image3']['name'];


	$temp_name1 = $_FILES['product_image1']['tmp_name'];
	$temp_name2 = $_FILES['product_image2']['tmp_name'];
	$temp_name3 = $_FILES['product_image3']['tmp_name'];
    move_uploaded_file($temp_name1, "../product_images/$product_img1");
    move_uploaded_file($temp_name2, "../product_images/$product_img2");
    move_uploaded_file($temp_name3, "../product_images/$product_img3");

    $insert_product	="INSERT INTO products(p_cat_id,cat_id,date,product_titel,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword) VALUES('{$product_cat}','{$categories}',NOW(),'{$product_title}','{$product_img1}','{$product_img2}','{$product_img3}','{$product_price}','{$product_desc}','{$product_keyword}')";
    $run_product = mysqli_query($con,$insert_product);
    if($run_product){
    	echo "<script>alert('Product inserted successfully')</script>";
    	echo "<script>window.open('index.php?view_product','_self')</script>";
    }

}

?>