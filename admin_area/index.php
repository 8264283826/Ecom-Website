<?php
session_start();
include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<?php
$admin_session = $_SESSION['admin_email'];
$get_admin = "SELECT * FROM admins WHERE admin_email='$admin_session'";
$run_admin = mysqli_query($con,$get_admin)or die('query fail');
$row_admin = mysqli_fetch_array($run_admin);
$admin_name = $row_admin['admin_name'];
$admin_id = $row_admin['admin_id'];

$get_pro = "SELECT * FROM  products";
$run_pro = mysqli_query($con,$get_pro)or die("Query fail : product");
$count_pro = mysqli_num_rows($run_pro);

$get_cust = "SELECT * FROM  customers";
$run_cust = mysqli_query($con,$get_cust)or die("Query fail : customer");
$count_cust = mysqli_num_rows($run_cust);

$get_pro_cat = "SELECT * FROM  categorys ";
$run_pro_cat = mysqli_query($con,$get_pro_cat)or die("Query fail : product");
$count_pro_cat = mysqli_num_rows($run_pro_cat);

$get_order = "SELECT * FROM  customer_order ";
$run_order = mysqli_query($con,$get_order)or die("Query fail : product");
$count_order = mysqli_num_rows($run_order);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
	 <!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script>tinymce.init({selector:'textarea'});</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="style.css">
   
</head>
<body>
  <div id="wrapper">
  	<?php
      include('includes/sidebar.php');

  	?>
  	<div id="page-wrapper">
  		<div class="container-fluid">
  			<?php
  			if(isset($_GET['dashboard'])){
    			include('dashboard.php');
    		}
        if(isset($_GET['insert_product'])){
          include('insert_product.php');
        }
        if(isset($_GET['view_product'])){
          include("view_product.php");
        }
        if(isset($_GET['delete_product'])){
          include('delete_product.php');
        }
        if(isset($_GET['edit_product'])){
          include('edit_product.php');
        }
        if(isset($_GET['insert_product_cat'])){
          include('insert_product_cat.php');
        }
        if(isset($_GET['view_product_cat'])){
          include('view_product_cat.php');
        }
        if(isset($_GET['delete_p_cat'])){
          include('delete_p_cat.php');
        }
        if(isset($_GET['edit_p_cat'])){
          include('edit_p_cat.php');
        }
        if(isset($_GET['view_category'])){
          include('view_category.php');
        }
        if(isset($_GET['delete_cat'])){
          include('delete_cat.php');
        }
        if(isset($_GET['edit_cat'])){
          include('edit_cat.php');
        }
        if(isset($_GET['insert_category'])){
          include('insert_category.php');
        }
        if(isset($_GET['insert_slider'])){
          include('insert_slider.php');
        }
        if(isset($_GET['view_slider'])){
          include('view_slider.php');
        }
        if(isset($_GET['slider_delete'])){
          include('slider_delete.php');
        }
        
        if(isset($_GET['view_customer'])){
          include('view_customer.php');
        }
        if(isset($_GET['delete_customer'])){
          include('delete_customer.php');
        }
        if(isset($_GET['view_order'])){
          include('view_order.php');
        }
        if(isset($_GET['delete_order'])){
          include('delete_order.php');
        }
        if(isset($_GET['view_payment'])){
          include('view_payment.php');
        }
        if(isset($_GET['delete_payment'])){
          include('delete_payment.php');
        }
        if(isset($_GET['insert_users'])){
          include('insert_users.php');
        }
        if(isset($_GET['view_users'])){
          include('view_users.php');
        }
        if(isset($_GET['delete_user'])){
          include('delete_user.php');
        }
         if(isset($_GET['user_profile'])){
          include('user_profile.php');
        }
  			?>
  		</div>
  	</div>
  </div>	


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>


<?php
}