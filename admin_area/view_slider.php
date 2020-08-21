<?php
include('includes/db.php');
if(!isset($_SESSION['admin_email'])){
  echo "<script>window.open('login.php','_self')</script>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
 <style type="text/css">
   #slider .box{
    border: 2px solid #2f9df9;
    border-radius: 7px;
   }
   #slider .box #heading{
    text-align: center;
    background-color:  #2f9df9;
    margin-bottom: 7px;
    border-radius: 3px;
    height: 25px;

   }
   #slider .box #heading a{
    color: darkblue;
   }
    #slider .box{
      background-color:  #d0a896 ;
    }
   #slider .box  img{
   margin: 1px 3px 8px 19px;
   }
   #slider .box #delete{
    background-color: #ab6675 ;
    height: 30px;

   }
    #slider .box #delete  a{
      padding-top: 10px;
      float: left;
      margin: 2px;
      color: red;
    }
    #slider .box #delete #edit{
      float: right;
      color:  #3510fe;
    }
 </style>
</head>
<body>


<div class="row"> <!-- row start -->
	<div class="col-lg-12">
		<ol class="breadcrumb">
  		  <li class="active">
  		  	<i class="fa fa-dashboard"></i>Dashboard / View Slider
  		  </li>
		</ol>
	</div>
</div> <!-- row end -->

<div class="row" id='in'><!-- row 2 start -->
  <div class="col-lg-8 col-md-12"><!-- col-lg-12 start -->
   <div class="panel panel-default"><!-- panel panel-default start -->
     <div class="panel-heading"><!-- panel-heading start -->
      <h3 class="panel-title">
        <i class="fa fa-money fa-fw"></i> <span>View Slider </span>
      </h3>
     </div><!-- panel-heading end -->
     <div class="panel-body"><!-- panel-body start -->
      <div class="row" id="slider"><!-- slider start -->
<?php
$select = "SELECT * FROM slider";
$run = mysqli_query($con,$select)or die('query fail :slider');
while ($row = mysqli_fetch_array($run)) {
  $id = $row['id'];
  $image =  $row['slider_image'];


?>
<div class="col-lg-2 col-md-3" id = 'colm'> <!-- col-lg-2 col-md-3 start -->
          <div class="box">
          <div id='heading'>
            <a href=""><p>Slider Number 1</p></a>
          </div>
          <div>
            <img src="slider_images/<?php echo $image; ?>"  width='110px' height='100px' >
          </div>
          <div id='delete'>
            <a href="index.php?slider_delete=<?php echo $id ?>"><i class="fa fa-trash-o">Delete</i></a>
            <a href="index.php?slider_edit=<?php echo $id ?>" id="edit"><i class="fa fa-pencil">Edit</i></a>
          </div>  
            </div>
          </div> <!-- col-lg-2 col-md-3 end -->

<?php
}
?>
</div> <!-- slider end -->
</div>

</body>
</html>
<?php

}

?>