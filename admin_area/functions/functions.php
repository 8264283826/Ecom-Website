<?php
$db = mysqli_connect("localhost","root","","ecom")or die("connetion fail");


     function getUserIP(){
        switch (true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : 
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
       }
     }

function addCart(){
    global $db;
    if(isset($_GET['add_cart'])){
        $ip_add = getUserIP();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $product_size = $_POST['product_size'];
        $check_product = "SELECT * FROM cart 
               WHERE ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db,$check_product);
        if(mysqli_num_rows($run_check)>0){
            echo "<script>
             alert('This product id already added in cart')
            </script>";
               echo "<script>
                window.open('details.php?pro_id=$p_id','_self')
            </script>";

        }else{
        $product_qty = $_POST['product_qty'];
            $query = "INSERT INTO cart(p_id,ip_add,qty,size) VALUES('$p_id','$ip_add','$product_qty','$product_size')";
            $run_query = mysqli_query($db,$query);
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
 
        }
    }
}

//item cart start
function item(){
		global $db;
		$ip_add = getUserIP();
		$get_items = "SELECT * FROM cart WHERE ip_add='{$ip_add}'";
		$run_items = mysqli_query($db,$get_items);
		$count = mysqli_num_rows($run_items);
		echo $count;
}

//item cart end

//total price count start 
function totalPrice(){
	global $db;
	$ip_add = getUserIP();
	$total = 0;
	$select_cat = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
	$run_cart = mysqli_query($db,$select_cat);
	while ($record = mysqli_fetch_array($run_cart)) {
		$pro_id = $record['p_id'];
		$pro_qty = $record['qty'];
	$get_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
		
		$run_price = mysqli_query($db,$get_price);
		while ($row = mysqli_fetch_array($run_price)) {
			$sub_total=$row['product_price'];
			$total +=$sub_total;
		}
	}
	echo $total;
}


//total price count start 

//for geting user ip end

function getPro(){
	global $db; 
	$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,6";
	$run_products = mysqli_query($db,$get_products);
	while ($row_product = mysqli_fetch_array($run_products)) {
		$pro_id = $row_product['product_id'];
		$product_titel = $row_product['product_titel'];
		$product_price = $row_product['product_price'];
		$product_img1 = $row_product['product_img1'];
		
		echo  "<div class = 'col-md-4 col-sm-6'>
             <div class = 'product box'>
            
             <center>
             <a href = 'details.php?pro_id=$pro_id'>
             <img src = 'admin_area/product_images/$product_img1' class = 'img-responsive' hight = '100px'>

             </a>
             </center>

             <div class = 'text'>
             <center>
             <h3><a href = 'details.php?pro_id=$pro_id'>$product_titel</a></h3>
             </center>
             <center
             <p class = 'price'>INR $product_price</p>
             <p class = 'button'><a href = 'details.php?pro_id=$pro_id' class = 'btn btn-default'>Viwe Details</a>
    			  <a href = 'details.php?pro_id=$pro_id' class = 'btn btn-primary'><i class = 'fa fa-shopping-cart'></i> Add to cart</a>
             </p>
             </center>
             </div>
            </div>
		</div>";
	}

}	


/* Product categories for sidebar in shop.php */
function getPCats(){
	global $db;
	$get_p_cats = "SELECT * FROM product_categorys";
	$run_p_cats = mysqli_query($db,$get_p_cats)or die("Query fail");
	while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
		$p_cat_id = $row_p_cats['p_cat_id'];
		$p_cat_title =$row_p_cats['p_cat_title'];
		$p_cat_desc =$row_p_cats['p_cat_desc'];

		echo "<li><a href = 'shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li>";

		
	}
}

/* categories for sidebar in shop.php*/
function getCat(){
	global $db;
	$get_cat = "SELECT * FROM categorys";
	$run_cat = mysqli_query($db,$get_cat);
	while ($row_cat = mysqli_fetch_array($run_cat)) {
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		$cat_desc = $row_cat['cat_desc'];
		echo "<li><a href = 'shop.php?cat_id=$cat_id'>$cat_title</a></li>";
        
	}
}

/* Get Product categories Product*/
function getPcatPro(){
	global $db;
	if(isset($_GET['p_cat_id'])){
		$p_cat_id = $_GET['p_cat_id'];
		$get_p_cat = "SELECT * FROM product_categorys WHERE p_cat_id = {$p_cat_id}";
		$run_p_cat = mysqli_query($db,$get_p_cat);
		$row_p_cat = mysqli_fetch_array($run_p_cat);
		$p_cat_title = $row_p_cat['p_cat_title'];
		$p_cat_desc = $row_p_cat['p_cat_desc'];
		$get_products = "SELECT * FROM products WHERE p_cat_id = {$p_cat_id}";
		$run_products = mysqli_query($db,$get_products)or die("Query fail");

		$count = mysqli_num_rows($run_products);
		if($count == 0){
			echo "
			<div class = 'box'>
				<h1>No product Found In This Product Category</h1>
			</div>
			";

		}else{
			echo "
			<div class = 'box'>
			<h1>$p_cat_title</h1>
			<p>$p_cat_desc</p>

			</div>
			";
		}
		while ($row_products = mysqli_fetch_array($run_products)) {
			$product_id = $row_products['product_id'];
			$product_titel = $row_products['product_titel'];
			$product_price = $row_products['product_price'];
			$product_img1 = $row_products['product_img1'];


			echo "
			<div class = 'col-md-3 col-sm-6 center-responsive'>
				<div class = 'product'>
				<a href = 'details.php?pro_id=$product_id'>
				<img src = 'images/product-img/$product_img1' class = 'img-responsive'>
				</a>
				
				<div class = 'text'>
					<h3><a href = 'details.php?pro_id=$product_id'>$product_titel</a></h3>
					<p class = 'price'>$product_price</p>
					<p class = button>
					<a href = 'details.php?pro_id=$product_id' class = 'btn btn-default'>View Details</a>
					<a href = 'details.php?pro_id=$product_id' class = 'btn btn-primary'><i class = 'fa fa-shopping-cart'></i>Add To Cart
					</a>
					</p>
				 </div>
				</div>
			</div>
   
			";

		}
	}

}


//get category
function getCatPro(){
	global $db;
	if(isset($_GET['cat_id'])){
		$cat_id = $_GET['cat_id'];
		$get_cat = "SELECT * FROM categorys WHERE cat_id = $cat_id";
		$run_cats = mysqli_query($db,$get_cat);
		$row_cat = mysqli_fetch_array($run_cats);
		$cat_title = $row_cat['cat_title'];
		$cat_desc = $row_cat['cat_desc'];
		$get_products = "SELECT * FROM products WHERE cat_id = $cat_id";
		$run_products = mysqli_query($db,$get_products);
		$count = mysqli_num_rows($run_products);
		if($count == 0){
			echo "
			<div class = 'box'>
				<h1>No product Found In This Product </h1>
			</div>
			";

		}else{
			echo "
			<div class = 'box'>
			<h1>$cat_title</h1>
			<p>$cat_desc</p>

			</div>
			";

		}
		while ($row_products = mysqli_fetch_array($run_products)) {
			$product_id = $row_products['product_id'];
			$product_titel = $row_products['product_titel'];
			$product_price = $row_products['product_price'];
			$product_img1 = $row_products['product_img1'];


			echo "
			<div class = 'col-md-3 col-sm-6 center-responsive'>
				<div class = 'product'>
				<a href = 'details.php?pro_id=$product_id'>
				<img src = 'images/product-img/$product_img1' class = 'img-responsive'>
				</a>
				
				<div class = 'text'>
					<h3><a href = 'details.php?pro_id=$product_id'>$product_titel</a></h3>
					<p class = 'price'>$product_price</p>
					<p class = button>
					<a href = 'details.php?pro_id=$product_id' class = 'btn btn-default'>View Details</a>
					<a href = 'details.php?pro_id=$product_id' class = 'btn btn-primary'><i class = 'fa fa-shopping-cart'></i>Add To Cart
					</a>
					</p>
				 </div>
				</div>
			</div>
   
			";

		}
	}
}
?>
