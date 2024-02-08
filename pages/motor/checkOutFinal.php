<?php 
include('../../function/common_file.php');
include('../../include/connection.php');
@session_start();
?>

<?php

// Get the current date
$currentDate = new DateTime();

// Add 7 days to the current date to set the due date
$dueDate = $currentDate->modify('+7 days');

// Format the due date as a string (optional)
$dueDateString = $dueDate->format('d/m/Y');
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
          ?> | Checkout</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

<?php 
$userIp=getIPAddress();
$userName=$_SESSION['username'];
$getUser="SELECT * FROM user_table WHERE user_ip='$userIp' AND username='$userName'";
$res=mysqli_query($conn,$getUser);
$runQuery=mysqli_fetch_array($res);
$userId=$runQuery['user_id'];
?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/MotorLogo.png" alt="MotorLogo.png" height="60" width="60">
  </div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
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

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
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
              <span class="badge badge-info right"><?php cartItems();?></span>
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
            <h1>Checkout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homeProducts.php">Home</a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-biking"></i> GearUpGarage
                    <small class="float-right">Date: <?php echo date("d/m/Y") ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                
                <div class="col-sm-4 invoice-col">
                  To


                  <?php 
                  $userSession=$_SESSION['username'];
                  $select="SELECT * FROM user_table WHERE username='$userSession'";
                  $resque=mysqli_query($conn,$select);
                  $rowfetch=mysqli_fetch_assoc($resque);
                  $user_id=$rowfetch['user_id'];
                  $user_name=$rowfetch['username'];
                  $user_email=$rowfetch['user_email'];
                  $user_address=$rowfetch['user_address'];
                  $user_mpbile=$rowfetch['user_mobile'];

                  echo "<address>
                  <strong>$user_name</strong><br>
                  $user_address<br>
                  Phone: $user_mpbile<br>
                  Email: $user_email
                </address> "
                  ?>
                  
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Quantity</th>
                      <th>Price Per Item</th>
                      <th>Product</th>
                      <th>Product Id</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php 
                     
                     
                          $total=0;
                          $selectCart="SELECT * FROM cart_details";
                          $res_query=mysqli_query($conn,$selectCart);
                         $selectCart="SELECT * FROM cart_details";
                          $res_query=mysqli_query($conn,$selectCart);
                          if(mysqli_num_rows($res_query) > 0){
                          while ($row=mysqli_fetch_assoc($res_query)) {
                          $proId=$row['product_id'];
                          $proQuan=$row['quantity'];
                          $price=$row['price'];
                          $name=$row['product_name'];
                          $selProd="SELECT * FROM products WHERE product_id='$proId'";
                          $res=mysqli_query($conn,$selProd);
                          
                          while ($rowProdPrice=mysqli_fetch_array($res)) {
                            $productdesc=$rowProdPrice['product_desc'];

                     ?>
                    <tr>
                      <td><?php echo $proQuan ?></td>
                      <td>₱<?php echo number_format($price) ?></td>
                      <td><?php echo $name ?></td>
                      <td><?php echo $proId ?></td>
                      <td><?php echo $productdesc?></td>
                      <td>₱<?php $tot_price = ($price * $proQuan); echo number_format($tot_price);
                       ?></td>
                    </tr>
                    <?php $total += $tot_price;  }}}?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                 
                  

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Orders will be delivered to you soon.
                  </p>
                  
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due <?php echo $dueDateString?></p>

                  <div class="table-responsive">
                    <table class="table">
                      
                        <th>Total:</th>
                        <td>₱
                        <?php echo number_format($total); ?><input type="hidden" name="total" value="<?php echo $total; ?>" ></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                
                  
                  
                  <a href="order.php?user_id=<?php echo $userId; ?>" ><button type="submit" name="btnSubmit" class="btn btn-success float-right" style="margin-right: 5px;">
                    <i class="fas fa-money-bill"></i> Pay Now
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
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

</body>
</html>
