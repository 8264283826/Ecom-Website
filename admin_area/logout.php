<?php
session_start();
session_destroy();
echo "<script>alert('Your are logout')</script>";
echo "<script>window.open('login.php','_self')</script>";


?>