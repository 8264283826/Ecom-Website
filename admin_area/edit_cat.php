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
            Dashboard / Insert Product Category 
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
               <span>Insert Product Category</span>
            </h3>
         </div><!--panel-heading end-->

          <?php
             $edit_id = $_GET['edit_cat'];
             $get_cat = "SELECT * FROM  categorys 
                   WHERE  cat_id = $edit_id";

             $run_cat= mysqli_query($con,$get_cat)or die('Query fail:edit');
             while ($row = mysqli_fetch_array($run_cat)) {
               
               $cat_title = $row['cat_title'];
               $cat_desc = $row['cat_desc'];
               
             }
         ?>

         <div class="panel-body"><!--panel-body start -->
            <form class="form-horizontal" action="" method="post"> <!-- form start -->
               <div class="form-group"> <!-- form-group start -->
                  <label class="col-md-3 control-label">Category Title</label>
                  <div class="col-md-6">

                    <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
                    
                  </div>
               </div>  <!-- form-group end -->

               <div class="form-group"> <!-- form-group start -->
                  <label class="col-md-3 control-label">Category Description
                  </label>
                  <div class="col-md-6">
                     
                   <textarea type='text' name="cat_desc" class="form-control">
                      <?php echo $cat_desc; ?>
                   </textarea>
                    
                  </div>
               </div>  <!-- form-group end -->

               <div class="form-group"> <!-- form-group start -->
                  <div class="col-md-3">
                     
                  </div>
                  <div class="col-md-6">

                    <input type="submit" name="update" class="btn btn-primary form-control" value="Update">
                    
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

if(isset($_POST['update'])){
   $cat_id = $_GET['edit_cat'];

   $cat_title = $_POST['cat_title'];
   $cat_desc = $_POST['cat_desc']; 
   $update_cat = "UPDATE categorys SET  
         cat_title ='{$cat_title}',cat_desc='{$cat_desc}' 
         WHERE cat_id = {$cat_id}"; 

  $run_category = mysqli_query($con,$update_cat)or die('query fail:');
    if($run_category){
      echo "<script>alert('Category Update successfully.')</script>";
      echo "<script>window.open('index.php?view_category','_self')</script>";
    } 
}

?>

