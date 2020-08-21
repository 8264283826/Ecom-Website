<?php
session_start();
$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
include("admin_area/functions/functions.php");

?>
<?php
if(isset($_GET['pro_id'])){
  $pro_id = $_GET['pro_id'];
  $get_product = "SELECT * FROM products WHERE product_id = $pro_id";
  $run_product = mysqli_query($con,$get_product)or die("query fail");
  $row_product =mysqli_fetch_array($run_product);
  $pro_cat_id = $row_product['p_cat_id'];
  $product_titel = $row_product['product_titel'];
  $product_img1 = $row_product['product_img1'];
  $product_img2 = $row_product['product_img2'];
  $product_img3 = $row_product['product_img3'];
  $product_price = $row_product['product_price'];
  $product_desc = $row_product['product_desc'];
 
  $get_p_cat = "SELECT * FROM product_categorys WHERE p_cat_id = $pro_cat_id";
  $run_p_cat = mysqli_query($con,$get_p_cat)or die("Query fail");
  $row_p_cat = mysqli_fetch_array($run_p_cat);
  $p_cat_id = $row_p_cat['p_cat_id'];
  $p_cat_title = $row_p_cat['p_cat_title'];
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<title>E-Commerce Store</title>
	<!-- Latest compiled and minified CSS -->
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
 <?php
include("header.php");
 ?>
  <div id = "content"><!-- content start -->
  	<div class = "container"><!--container start -->
  		<div class="col-md-12"><!-- col-md-12 start -->
  			<ul class="breadcrumb">
  				<li><a href="index.php">HOME</a></li>
  				<li>shop</li>
          <li>
            <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php 
            echo $p_cat_title; ?></a>
          </li>
          <li>
            <?php 
            echo $product_titel;
       
            ?>
          </li>
  			</ul>
  			
  		</div> <!-- col-md-12 end -->
  		 <div class = "col-md-3"> <!--col-md-3 start -->
  		 	<?php
            include("includes/sidebar.php")
  		 	?>

  		 </div> <!--col-md-3 end -->
       <div class="col-md-9"><!--col-md-9 start -->
         <div class="row" id="productmain"><!--row start -->
           <div class="col-sm-6"> <!--col-sm-6 start -->
             <div class="mainimage"><!--mainimage start -->
               <div id="mycarousel" class="carousel slide" data-ride="carousel"> <!-- carousel slide start-->
    <!-- Indicators --> 
    <ol class="carousel-indicators">
      <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
      <li data-target="#mycarousel" data-slide-to="1"></li>
      <li data-target="#mycarousel" data-slide-to="2"></li>
        
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">  <!-- carousel-inner start-->
      <div class="item active">
        <center>
        <img src="images/product-img/<?php echo $product_img1; ?>" class="img-responsive" >
        </center>
      </div>

      <div class="item">
        <center>
        <img src="images/product-img/<?php echo $product_img2; ?>" class="img-responsive">
        </center>
      </div>
    
      <div class="item">
        <center>
        <img src="images/product-img/<?php echo $product_img3; ?>" class="img-responsive" >
         </center>
      </div>
   
    </div><!-- carousel-inner end-->
     <!-- Left and right controls -->

    <a class="left carousel-control" href="#mycarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span> 
    </a>
    <a class="right carousel-control" href="#mycarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
 </div>  <!-- carousel slide end-->
             </div><!--mainimage end -->
           </div><!--col-sm-6 end -->
           <div class="col-sm-6">   <!--col-sm-6 start -->
            <div class="box"> <!-- box start -->
              <h1 class="text-center"><?php echo $product_titel;  ?></h1> <?php
                addCart();
              ?>


            
              <form action = "details.php?add_cart=<?php echo $pro_id ?>" method="POST" class="form-horizontal"> <!-- form start -->
                <div class="form-group">
                  <label class="col-md-5 control-label">Product Quantity</label>
                  <div class="col-md-7">   <!-- col-md-7 start -->
                      <select name="product_qty" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                  </div>   <!--- col-md-7 end -->
                </div>
                 <div class="form-group">
                <label class="col-md-5 control-label">Product Size</label>
                <div class="col-md-7">
                  <select name ="product_size" class="form-control">
                    <option>Select a size</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                    <option>Extra Large</option>
                  </select>
                </div>
              </div>
              <p class="price"><?php echo "INR ".$product_price  ?></p>
              <p class="text-center buttons">
                <button class="btn btn-primary" type = "  "> 
                  <i class="fa fa-shopping-cart"></i>Add to cart
                </button>
              </p>
              </form>   <!-- form end -->
             
            </div> <!-- box end -->
             <div class="col-xs-4">
               <a href="#" id="thumbs">
          <img src="images/product-img/<?php echo $product_img1 ?>" class="img-responsive">
               </a>
             </div>
              <div class="col-xs-4">
               <a href="#" id="thumbs">
          <img src="images/product-img/<?php echo $product_img2 ?>" class="img-responsive">
               </a>
             </div>
              <div class="col-xs-4">
               <a href="#" id="thumbs">
          <img src="images/product-img/<?php echo $product_img3 ?>" class="img-responsive">
               </a>
             </div>
           </div> <!--col-sm-6 end -->
         </div><!--row end -->
         <div class = "box" id ="details"><!-- box start -->
           <h4>Product Details</h4>
           <p>
             <?php echo $product_desc  ?>
           </p>
           <h4>Size</h4>
           <ul>
             <li>small</li>
             <li>Medium</li>
             <li>Large</li>
             <li>Extra Large</li>
             

           </ul>
         </div><!-- box end -->
         <div id = "row same-height-row"><!--row same-height-row start -->
          <div class = "col-md-3 col-sm-6"><!--col-md-3 col-sm-6 start -->
            <div class="box same-height headline">
              <h3 class="text-center">You Also This Products</h3>
            </div>
          </div><!--col-md-3 col-sm-6 end-->
           <?php  
           $get_product = "SELECT * FROM products ORDER BY 1 LIMIT 0,3";
           $run_product = mysqli_query($con,$get_product)or die("query fail");
           while ($row = mysqli_fetch_array($run_product)) {
             $product_id = $row['product_id'];
             $product_titel = $row['product_titel'];
             $product_price = $row['product_price'];
             $product_img1 = $row['product_img1'];
            echo "

               <div class = 'center-responsive col-md-3 col-sm-6'>
                <div class = 'product same-height'>
                  <a href = 'details.php?pro_id=$product_id'>
                  <img src = 'images/product-img/$product_img1' class = 'img-responsive'>
                  </a>
                  <div class = 'text'>
                  <center>
                  <h3><a href = 'details.php?pro_id=$product_id'>$product_titel</a></h3>
                  <p class = 'price'> $product_price</p>
                  </center>
                  </div>
                </div>
               </div>
            ";

           }
            ?>
         </div><!--row same-height-row end-->
        
       </div><!--col-md-9 end -->

    </div><!--container  end-->
     
</div> <!--content end-->




 <?php
include("includes/footer.php");
 ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>