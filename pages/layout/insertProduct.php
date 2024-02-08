<?php
 include ('../../include/connection.php');
if(isset($_POST['insert_prod'])){

  $prod_name=$_POST['product_name'];
  $prod_desc=$_POST['product_desc'];
  $prod_key=$_POST['product_key'];
  $prod_cat=$_POST['prod_cat'];
  $prod_brand=$_POST['prod_brand'];
  $prod_price=$_POST['product_price'];
  $prod_stock=$_POST['stock'];
  $prod_stat='true';

  //Inserting Image
  $prod_img=$_FILES['product_img']['name'];

  //Accessing Image tmp_Name
  $temp_img=$_FILES['product_img']['tmp_name'];

  //Validate Entries
  if ($prod_name=='' or $prod_desc=='' or $prod_key=='' or $prod_cat=='' or $prod_brand=='' or $prod_img=='' or $prod_price=='') {
    
echo '<script> Swal.fire("Please Enter All Fields"); </script>';
exit();
  }else{

    move_uploaded_file($temp_img,"./productImages/$prod_img");

    //Insert Into Database

    $sqlProd="INSERT INTO products (product_name,product_desc,product_key,cat_id,stock,brand_id,product_img,product_price,date,status)
     VALUES ('$prod_name','$prod_desc','$prod_key','$prod_cat','$prod_stock','$prod_brand','$prod_img','$prod_price',NOW(),'$prod_stat')";

$resQuery=mysqli_query($conn,$sqlProd);
if($resQuery){
echo "<script>alert('Product Is Added')</script>";
  header("Location: ../adminmotor/viewProducts.php");

}

  }

}
?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MOTOR | Add Products</title>

  <!-- SweetAlert2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/MotorLogo.png" alt="MotorLogo" height="60" width="60">
  </div>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../shopDashboard.php" class="navbar-brand">
        <img src="../../dist/img/MotorLogo.png" alt="MotorLogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MOTOR</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item">
            <a href="../../shopDashboard.php" class="nav-link">Home</a>
          </li>
          
          
        </ul>

       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
         
                       
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/MotorLogo.png" alt="MotorLogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="./homeProducts.php" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>My Products</p>
            </a>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Shop
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="./shopProfile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Shop Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="../../shopDashboard.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Motorshop Statistics</p>
                </a>
              </li>
            </ul>

            
          </li>
          
          
          
          
          
          <li class="nav-item">
            <a href="./browse.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Browse Shops</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../shopDashboard.php">Home</a></li>              
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container mt-3">

    
      <form action="" method="POST" enctype="multipart/form-data">

        <!-- Product Name -->
        <div class="form-outline mb-4 w-50 m-auto" >
          <label for="product_title" class="form-label">Product Name</label>
          <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" autocomplete="off" required="required">
        </div>

      <!-- Description -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <label for="product_desc" class="form-label">Product Description</label>
          <input type="text" name="product_desc" id="product_desc" class="form-control" placeholder="Enter Description" autocomplete="off" required="required">
        </div>

      <!-- Stock -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <label for="product_key" class="form-label">Product Stocks</label>
          <input type="number" name="stock" id="stock" class="form-control" placeholder="Product Stocks" autocomplete="off" required="required">
        </div>
        
      <!-- Keyword -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <label for="product_key" class="form-label">Product Keyword</label>
          <input type="text" name="product_key" id="product_key" class="form-control" placeholder="Enter Description" autocomplete="off" required="required">
        </div>

      <!-- Category -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <select name="prod_cat" class="form-select" id="">
            <option value="">Select Category</option>
          <?php
          include ('../../include/connection.php');
          $sel_brand="SELECT * FROM category";
          $res_q=mysqli_query($conn,$sel_brand);

          while ($row=mysqli_fetch_assoc($res_q)) {
            $c_name=$row['category_name'];
            $c_id=$row['cat_id'];
            echo "<option value='$c_id'>$c_name</option>";
          
          }                
          ?>
            
          </select>
        </div>

         <!-- Brand -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <select name="prod_brand" class="form-select" id="">
            <option value="">Select Brand</option>
            <?php
          include ('../../include/connection.php');
          $sel_brand="SELECT * FROM brand";
          $res_q=mysqli_query($conn,$sel_brand);

          while ($row=mysqli_fetch_assoc($res_q)) {
            $b_name=$row['brand_name'];
            $b_id=$row['brand_id'];
            echo "<option value='$b_id'>$b_name</option>";
          
          }                
          ?>
          </select>
        </div>

      <!-- Image -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <label for="product_img" class="form-label">Product Image</label>
          <input type="file" name="product_img" id="product_img" class="form-control" required="required">
        </div>

        <!-- Price -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <label for="product_price" class="form-label">Product Price</label>
          <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Enter Price" autocomplete="off" required="required">
        </div>

        <!-- Insert -->
      <div class="form-outline mb-4 w-50 m-auto" >
          <input type="submit" name="insert_prod" class="btn btn-info mb-3 px-3" value="Insert Products">
        </div>

      </form>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
