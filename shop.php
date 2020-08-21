<?php
session_start();
$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
include("admin_area/functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<title>E-Commerce Store</title>
	<!-- Latest compiled and minified CSS -->
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=" style.css">

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
  			</ul>
  			
  		</div> <!-- col-md-12 end -->
  		 <div class = "col-md-3"> <!--col-md-3 start -->
  		 	<?php
            include("includes/sidebar.php")
  		 	?>
  		 </div> <!--col-md-3 end -->

        <div class = "col-md-9"><!--col-md-9 start -->
        	 <?php
                if(!isset($_GET['p_cat_id'])){
                    if(!isset($_GET['cat_id'])){
                        echo "<div class = 'box'>
                        <h1>Shop</h1>
                        <p>If you want to domain name and shared hosting palan in low price then Please visit www.teehosting.com</p>    
                        </div>";
                    }
                }

             ?>
        	<div class = "row">  <!-- row start -->
        	<?php
                if(!isset($_GET['p_cat_id'])){
                    if(!isset($_GET['cat_id'])){
                    $per_page = 6;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page =1;
                    }
                    $start_from = ($page-1)*$per_page;
                    $get_product = "SELECT * FROM products ORDER BY 1 DESC
                     LIMIT {$start_from},{$per_page}";
                    $run_pro = mysqli_query($con,$get_product)or die("Query fail");
                    while ($row = mysqli_fetch_array($run_pro)) {
                        $product_id = $row['product_id'];
                        $product_titel = $row['product_titel'];
                        $product_price = $row['product_price'];
                        $product_img1 = $row['product_img1'];

                        echo "
                            <div class = 'col-md-4 col-sm-6 center-responsive'>
                            <div class = 'product'>
                            <a href = 'details.php?pro_id=$product_id'>
                            <img src = 'images/product-img/$product_img1' class = 'img-responsive'>
                            </a>
                            <div class = 'text'>
                           <h3><a href = 'details.php?pro_id=$product_id'>$product_titel</a></h3
                           <p class = 'price'>
                           INR $product_price
                           </p>
                           <p class = 'button'>
                           <a href = 'details.php?pro_id=$product_id' class = 'btn btn-default'>View Details</a>
                           <a href = 'details.php?pro_id=$product_id' class = 'btn btn-primary'><i class = 'fa fa-shopping-cart'></i>
                                Add To Cart
                           </a>
                           </p>
                            </div>
                            </div>
                            </div>

                        ";
                    }

            ?>

        	</div> <!-- row end -->
        	<center>
        		<ul class = "pagination">
        			<?php
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($con,$query);
                    $total_record = mysqli_num_rows($result);
                    $total_page = ceil($total_record/$per_page);
                    echo '
                        <li><a href = "shop.php?page=1">First Page</a></li>
                        ';
                        for($i=1;$i<=$total_page;$i++){
                           echo '
                        <li><a href = "shop.php?page='.$i.'">'.$i.'</a></li>
                        ';
                        }
                        echo '
                            <li><a href = "shop.php?page='.$total_page.'">Last Page</a></li>
                        ';
                    
                   
                    
               }
           }
                    ?>
        		</ul>
        	</center>
            
                <?php
                getpcatPro();
                getCatPro();

                ?>
           
        </div><!---col-md-9 end -->

   </div><!--container  end-->
     
</div> <!--content end-->




 <?php
include("includes/footer.php");
 ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>