<?php
include('../../include/connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php 
          if (isset($_SESSION['username'])) {
            echo $_SESSION['username'];
          }else{
            echo 'Guest';
          }          
          ?> | Item Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/MotorLogo.png" alt="MotorLogo" height="60" width="60">
  </div>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="homeProducts.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./homeProducts.php" class="brand-link">
      <img src="../../dist/img/MotorLogo.png"
           alt="Motor Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GearUpGarage</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php 
          if (isset($_SESSION['username'])) {
            $user=$_SESSION['username'];
            $userimg="SELECT * FROM user_table WHERE username='$user'";
            $resImg=mysqli_query($conn,$userimg);
            $rowImg=mysqli_fetch_array($resImg);
            $userImage=$rowImg['user_image'];
            echo "<img src='../motor/userImage/$userImage' class='img-circle elevation-2' alt='User Image'>";
          }else{
            echo "<img src='../../dist/img/guest.png' class='img-circle elevation-2' alt='User Image'>";
          }          
          ?>
        </div>
        <?php 
          if (!isset($_SESSION['username'])) {
            echo "<div class='info'>
            <a>Welcome Guest</a>
          </div>";
          }else{
            echo "<div class='info'>
            <a>Welcome ".$_SESSION['username']."</a>
          </div>";
          }          
          ?>
        
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
      
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">MAIN PAGE</li>
               <li class="nav-item">
            <a href="./homeProducts.php" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>Shop Products</p>
            </a>
          </li>
          <li class="nav-header">YOUR PROFILE</li>
          <?php 
          if (!isset($_SESSION['username'])) {
            echo '<li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>My Profile</p>
            </a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a href="./shopProfile.php" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>My Profile</p>
            </a>
          </li>';
          }          
          ?>

          <li class="nav-item">
            <a href="./cart.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <span class="badge badge-info right"><?php include('../../function/common_file.php'); cartItems();?></span>
              <p>Cart</p>
            </a>
          </li>
          
          <?php 
          if (!isset($_SESSION['username'])) {
            echo '<li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>Book Appointment</p>
            </a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a href="../../index.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Book Appointment</p>
            </a>
          </li>';
          }          
          ?>
<li class="nav-header">ACCOUNT</li>
          
          <?php 
          if (!isset($_SESSION['username'])) {
            echo '<li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
              <span class="badge badge-info right"></span>
              <p>Login</p>
            </a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <span class="badge badge-info right"></span>
              <p>Logout</p>
            </a>
          </li>';
          }          
          ?>
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      <div class="row mb-2">
          <div class="col-sm-6">
          <?php
          if(isset($_GET['productId'])){
    $product=$_GET['productId'];
$select="SELECT * FROM products where product_id=$product";
$res_query=mysqli_query($conn,$select);
while ($row=mysqli_fetch_assoc($res_query)) {
  $prod_id=$row['product_id'];
  $prod_name=$row['product_name'];
$prod_desc=$row['product_desc'];
$prod_key=$row['product_key'];
$prod_img=$row['product_img'];
$prod_price=$row['product_price'];
$prod_catId=$row['cat_id'];
$prod_brandId=$row['brand_id'];
         echo   "<h1>More about $prod_name</h1>
          </div>
          <div class='col-sm-6'>
            <ol class='breadcrumb float-sm-right'>
              <li class='breadcrumb-item'><a href='homeProducts.php'>Home</a></li>
              <li class='breadcrumb-item active'>$prod_name</li>
            </ol>
          </div>";
}
          }
          ?>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php
 if(isset($_GET['productId'])){
    $product=$_GET['productId'];
$select="SELECT * FROM products where product_id=$product";
$res_query=mysqli_query($conn,$select);
while ($row=mysqli_fetch_assoc($res_query)) {
  $prod_id=$row['product_id'];
  $prod_name=$row['product_name'];
$prod_desc=$row['product_desc'];
$prod_key=$row['product_key'];
$prod_img=$row['product_img'];
$prod_stock=$row['stock'];
$prod_price=$row['product_price'];
$prod_catId=$row['cat_id'];
$prod_brandId=$row['brand_id'];

echo "<div class='card card-solid'>
<div class='card-body'>
  <div class='row'>
    <div class='col-12 col-sm-6'>
      <h3 class='d-inline-block d-sm-none'>$prod_name</h3>
      <div class='col-12'>
        <img src='../layout/productImages/$prod_img' class='product-image' alt='$prod_name'>
      </div>
      <div class='col-12 product-image-thumbs'>
        <div class='product-image-thumb active'><img src='../layout/productImages/$prod_img' alt='$prod_name'></div>               
      </div>
    </div>
    <div class='col-12 col-sm-6'>
      <h3 class='my-3'>$prod_name</h3>
      <p>$prod_desc</p>

      <hr>
      

      <div class='bg-gray py-2 px-3 mt-4'>
        <h2 class='mb-0'>
          Price: ₱$prod_price
        </h2>
        <h4 class='mt-0'>
          <small>Ex Tax: ₱$prod_price </small>
        </h4>
        <h4 class='mt-0'>
          <small>Available Stocks: $prod_stock </small>
        </h4>
      </div>

      <div class='mt-4'>
        <div class='btn btn-primary btn-lg btn-flat'>
        <a href='homeProducts.php?addToCart=$prod_id' class='text-light'><i class='fas fa-cart-plus fa-lg mr-2'></i>       
          Add to Cart</a>
        </div>
        

        
      </div>

      

    </div>
  </div>
  <div class='row mt-4'>
    <nav class='w-100'>
      <div class='nav nav-tabs' id='product-tab' role='tablist'>
        <a class='nav-item nav-link active' id='product-desc-tab' data-toggle='tab' href='#product-desc' role='tab' aria-controls='product-desc' aria-selected='true'>Description</a>
        
      </div>
    </nav>
    <div class='tab-content p-3' id='nav-tabContent'>
      <div class='tab-pane fade show active' id='product-desc' role='tabpanel' aria-labelledby='product-desc-tab'>$prod_desc</div>
      
    </div>
  </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->";
}
 
 }
 
?>
      <!-- Default box -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
  <div class="float-right d-none d-sm-block">
      <b>For</b> CaseStudy Only
    </div>
    <strong>Copyright &copy; 2023 <a href="./homeProducts.php">GearUpGarage</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>
</html>
