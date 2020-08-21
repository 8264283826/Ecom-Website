 <?php
session_start();
include("admin_area/functions/functions.php");
$con = mysqli_connect("localhost","root","","ecom")or die("connetion fail");
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
          <li><a href="home.php">HOME</a></li>
          <li>cart</li>
        </ul>
        
      </div> <!-- col-md-12 end -->
     <div class="col-md-9" id = "cart"><!--col-md-9" id = "cart" starrt -->
       <div class="box"><!-- box start -->
         <form action="cart.php" method="post" enctype = "multipart-form-data"><!--multipart-form-data start -->
          <h1>Shopping Cart</h1>
          <?php
            $ip_add = getUserIP();
            $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
            $run_cart = mysqli_query($con,$select_cart);           
            $count = mysqli_num_rows($run_cart);

          ?>
          <p class="text-muted">Currently you have <?php item();  ?> item(s) in your cart</p>
          <div class="table-responsive"> <!--table-responsive start -->
            <table class="table">  <!--table start -->
              <thead>
                <tr>
                  <th colspan="2">Product </th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>size</th>
                  <th colspan="1">Detele</th>
                  <th colspan="1">Sub Total</th>
                </tr>
              </thead>
              <tbody><!--tbody start -->
                <?php
                $total1 =0;
                 while ($row =mysqli_fetch_array($run_cart)) {
                  $pro_id = $row['p_id'];
                  $pro_size = $row['size'];
                  $pro_qty= $row['qty'];
                  $get_product = "SELECT * FROM products WHERE product_id ='$pro_id'";
                  $run_pro = mysqli_query($con,$get_product);
                  while ($row1 = mysqli_fetch_array($run_pro)) {
                  $p_title =$row1['product_titel'];
                  $p_img =$row1['product_img1'];
                  $p_price = $row1['product_price'];
                  $sub_total1 = $p_price*$pro_qty;
                  $total1 += $sub_total1

                ?>
                 <tr>
                   <td><img src="images/product-img/<?php echo $p_img;  ?>"></td>
                   <td>Mardaz Pack of 5 - Multicolor Cotton V-Neck T-shirts For Men</td>
                   <td><?php echo $pro_qty;  ?></td>
                   <td>INR <?php echo $p_price  ?></td>
                   <td><?php echo $pro_size;  ?></td>
                   <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                   <td>INR <?php  echo $sub_total1; ?></td>
                 </tr>
                 <?php 
                  } 
                }
                 ?> 
                 
              </tbody><!--tbody end -->
              <tfoot><!--tfoot start -->
                <tr>
                  <th colspan="5">Total</th>
                  <th colspan="2">INR <?php echo $total1; ?> </th>  
                </tr>
              </tfoot><!--tfoot end -->
            </table> <!--table end -->
          </div> <!--table-responsive end -->
          <div class="box-footer"><!-- box-footer start -->
            <div class="pull-left"><!--pull-left start -->
              <a href="index.php" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>Continue Shopping
              </a>
            </div><!--pull-left end -->
            <div class="pull-right">
              <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                <i class="fa fa-refresh">Update Cart</i>
              </button>
              <a href="checkout.php" class="btn btn-primary">
                Proceed to checkout<i class="fa-chevron-right"></i>
              </a>
            </div>
          </div><!--box-footer end -->
          </form> <!--multipart-form-data end -->
       </div><!--box end -->
       <?php
       function update_cart(){
        global $con;
        if(isset($_POST['update'])){
          foreach ($_POST['remove'] as $remove_id) {
            $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id'";
            $run_del = mysqli_query($con,$delete_product);
            if($run_del){
              echo "<script>window.open('cart.php','_self')</script>";
            }
          }
        }

       }
       echo @$up_cart = update_cart(); 
       ?>
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
                  <h3><a href = 'details.php?pro_id=$product_id'>$product_titel</a></h3>
                  <p class = 'price'> $product_price</p>
                  </div>
                </div>
               </div>
            ";

           }
            ?>
         </div><!--row same-height-row end-->
     </div><!--col-md-9" id = "cart" end -->
     <div class="col-md-3"><!--col-md-3 start -->
       <div class="box" id="order-summary">
         <div class="box-header">
           <h3>Order Summary</h3>
         </div>
         <p class="text-muted">
           Shipping and additional costs are calculated based on the values you have entered
         </p>
         <div class="table-responsive"> 
             <table class="table">
              <tbody>
                <tr>
                  <td>Order Subtotal</td>
                  <th>INR <?php echo $total1 ?></th>
                </tr>
                <tr>
                  <td>Shipping and handling</td>
                  <td>INR 0</td>
                </tr>
                <tr>
                  <td>Tax</td>
                  <td>INR 0</td>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <th>INR <?php echo $total1 ?></th>
                </tr>
              </tbody>
             </table> 
         </div>
      
       </div>
     </div> <!---col-md-3 end -->


     </div><!--container  end-->
     
</div> <!--content end-->




 <?php
include("includes/footer.php");
 ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</body>
</html>