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
	 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
	
</head>
<body>
<div class="row"> <!--row start -->
	<div class="col-lg-12"><!--col-lg-12 start -->
		<div class = "breadcrumb"><!--breadcrumb start -->
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Edit Product 
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
					<span>Edit Product</span>
				</h3>
			</div><!--panel-heading end-->
			<?php
             $edit_id = $_GET['edit_product'];
             $get_pro = "SELECT * FROM products WHERE  	product_id = $edit_id";
             $run_pro= mysqli_query($con,$get_pro)or die('Query fail:edit');
             while ($row = mysqli_fetch_array($run_pro)) {
             	
             	$product_titel = $row['product_titel'];
             	$p_cat_id = $row['p_cat_id'];
         		$cat_id = $row['cat_id'];
             	$product_img1 = $row['product_img1'];
             	$product_img2 = $row['product_img2'];
             	$product_img3 = $row['product_img3'];
             	$product_price = $row['product_price'];
             	$product_desc = $row['product_desc'];
             	$product_keyword = $row['product_keyword'];
                
                $get_cat = "SELECT * FROM categorys WHERE cat_id = $cat_id";
                $run_cat = mysqli_query($con,$get_cat)or die('Query fail : category');
                while ($row_cat = mysqli_fetch_array($run_cat)) {
                	$category_title = $row_cat['cat_title'];
                }
                $get_cat_pro = "SELECT * FROM product_categorys WHERE  	p_cat_id = $p_cat_id";
                $run_cat_pro = mysqli_query($con,$get_cat_pro)or die('Query fail :  product category');
                while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
                	$pro_category_title = $row_cat_pro['p_cat_title'];
                }


             }
			?>
			<div class="panel-body">
					<form class="form-horizontal" action = "<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype ="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<input type="text" name="product_title" class="form-control" value="<?php echo $product_titel; ?>" required="">
						</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Category</label>
						<select name="product_cat" class="form-control">
							<option ><?php echo $pro_category_title; ?></option>
							<?php
                             
                            $get_p_cats = "SELECT * FROM product_categorys";
                            $run_p_cats = mysqli_query($con,$get_p_cats)or die("Query fail");
                             while ($row = mysqli_fetch_array($run_p_cats)) {
                              	$id = $row['p_cat_id'];
                              	$cat_title = $row['p_cat_title'];
                              	echo '<option value = "'.$cat_title.'">'.$cat_title.'</option>';
                              } 

							?>
						</select>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Categories</label>
						<select name="cat" class="form-control">
							<option ><?php echo $category_title; ?></option>
							<?php
                             
                            $get_cats = "SELECT * FROM categorys";
                            $run_cats = mysqli_query($con,$get_cats)or die("Query fail");
                             while ($row = mysqli_fetch_array($run_cats)) {
                              	$id = $row['cat_id'];
                              	$cat_title = $row['cat_title'];
                              	echo '<option value = "'.$cat_title.'">'.$cat_title.'</option>';
                              } 

							?>
						</select>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Image 1</label>
						<input type="file" name="product_image1" class="form-control" required="" value="<?php echo $product_img3;?>">
						<br>
						<img src="product_images/<?php echo $product_img1; ?>" width ='70' height='70'>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Image 2</label>
						<input type="file" name="product_image2" class="form-control" required="" value="<?php echo $product_img3;?>">
						<br>
						<img src="product_images/<?php echo $product_img2; ?>" width ='70' height='70'>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Image 3</label>
						<input type="file" name="product_image3" class="form-control" required="" value="<?php echo $product_img3;?>">
						<br>
						<img src="product_images/<?php echo $product_img3; ?>" width ='70' height='70'>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Price</label>
						<input type="text" name="product_price" class="form-control" required="" value="<?php echo $product_price; ?>">
						
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Keyword</label>
						<input type="text" name="product_keyword" class="form-control" required="" value="<?php echo
						 $product_keyword; ?>">
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Product Description</label>
						<textarea name="product_desc" class="form-control" rows="6" cols="19" >
							<?php echo $product_desc; ?>
						</textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
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

if(isset($_POST['update'])){
	$pro_id = $_GET['edit_product'];

    $product_title   = $_POST['product_title'];

	 $product_cat     = $_POST['product_cat']; 
	 $categories      = $_POST['cat']; 

    $get_cat2 = "SELECT * FROM categorys WHERE cat_title = '$categories'"; 
                $run_cat1 = mysqli_query($con,$get_cat2)or die('Query fail : category');
                while ($row_cat1 = mysqli_fetch_array($run_cat1)) {
                	$category_id = $row_cat1['cat_id'];
                }
    $get_cat_pro1 = "SELECT * FROM product_categorys 
                    WHERE p_cat_title = '$product_cat'";
           
    $run_cat_pro1 = mysqli_query($con,$get_cat_pro1)or die('Query fail :  product category');
                while ($row_cat_pro1 = mysqli_fetch_array($run_cat_pro1)) {
              	  $pro_category_id = $row_cat_pro1['p_cat_id']; 
                }

	
	$product_price   = $_POST['product_price'];
	$product_keyword = $_POST['product_keyword'];
	$product_desc    = $_POST['product_desc'];
	

	$product_img1   = $_FILES['product_image1']['name'];
	$product_img2   = $_FILES['product_image2']['name'];
	$product_img3   = $_FILES['product_image3']['name'];


	$temp_name1 = $_FILES['product_image1']['tmp_name'];
	$temp_name2 = $_FILES['product_image2']['tmp_name'];
	$temp_name3 = $_FILES['product_image3']['tmp_name'];
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

  $update_pro = "UPDATE products SET p_cat_id ={$pro_category_id}, cat_id ={$category_id},date = NOW(),product_titel= '{$product_title}',product_img1 ='{$product_img1}',product_img2='{$product_img2}',product_img3='{$product_img3}',product_price ={$product_price},product_desc='{$product_desc}',product_keyword ='{$product_keyword}' WHERE  	product_id = {$pro_id} "; 

  $run_product = mysqli_query($con,$update_pro)or die('query fail:');
    if($run_product){
    	echo "<script>alert(Product inserted successfully)</script>";
    	echo "<script>window.open('index.php?view_product','_self')</script>";
    } 
}

?>

<?php
}
?>



