<?php 
session_start();
if(empty($_SESSION['username']))
{
  header('location:./login.php');
}
include('../../function/common_file.php');
include('../../include/connection.php');

?>
<?php 
               
               $user=$_SESSION['username'];
               $userimg="SELECT * FROM user_table WHERE username='$user'";
               $resImg=mysqli_query($conn,$userimg);
               $rowImg=mysqli_fetch_array($resImg);
               $userImage=$rowImg['user_image'];
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
          ?> | My Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  

  <style>
.cartImg{
  width: 100px;
  height: 100px;
  
}

.profileimg{
  width: 100%;
  height: 100%;
  
  
}

  </style>

</head>
<body class="hold-transition sidebar-mini">




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
        <a href="./homeProducts.php" class="nav-link">Home</a>
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
            <a href="./homeProducts.php" class="nav-link">
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
            <a href="./shopProfile.php" class="nav-link active">
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
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="col-md-10">
            <?php getUserOrder();
            if (isset($_GET['editaccount'])) {
              include('editaccount.php');
            }
            ?>
          </div>

    </section>
    <section class="content">
    
      <div class="container-fluid" >
        
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              
              <div class="card-body box-profile" style="height:100vh">

                <?php 
               
                $user=$_SESSION['username'];
                $userimg="SELECT * FROM user_table WHERE username='$user'";
                $resImg=mysqli_query($conn,$userimg);
                $rowImgg=mysqli_fetch_array($resImg);
                $userImagee=$rowImgg['user_image'];
                echo "<div class='text-center'>
                <img class='profileimg'
                     src='../motor/userImage/$userImagee'
                     alt='User profile picture'>
              </div>";
                ?>

              

                <h3 class="profile-username text-center"><?php echo $_SESSION['username']; ?></h3>

                <p class="text-muted text-center">Software Engineer</p>
                <a href="shopProfile.php?pendingorder" class="btn btn-secondary btn-block"><b>Pending Orders</b></a>
                <a href="shopProfile.php?editaccount" class="btn btn-warning btn-block"><b>Edit Account</b></a>
                <a href="user_order.php?myorders" class="btn btn-success btn-block"><b>My Orders</b></a>
                <a href="deleteacc.php" class="btn btn-danger btn-block"><b>Delete Account</b></a>
                <a href="logout.php" class="btn btn-info btn-block"><b>Logout</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
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


</body>
</html>

<?php 
 /*                 $getorder="SELECT * FROM user_order WHERE user_id=$userUser";
                  $orderQuery=mysqli_query($conn,$getorder);
                  while ($rowOrders=mysqli_fetch_assoc($orderQuery)) {
                    $orderId=$rowOrders['order_id'];
                    $orderAmount=$rowOrders['amount_due'];
                    $orderTotal=$rowOrders['total_products'];
                    $orderInvoice=$rowOrders['invoice_number'];
                    $orderStatus=$rowOrders['order_status'];
                    $orderStatus=$rowOrders['order_status'];
                    $orderDate=$rowOrders['order_date'];
                    $num=1;
                      echo "<tr>
                      <td>$num</td>
                      <td>$orderId</td>
                      <td>$orderAmoung</td>
                        <td>$orderTotal</td>
                        <td>$orderInvoice</td>
                        <td>$orderDate</td>
                        <td>sample</td>
                        <td>sample</td>
                      </tr>"  ;
                      $num++;
                  }
                 */ ?>

<?php /*
                                      $getorder="SELECT * FROM user_order WHERE user_id=$userUser";
                                      $orderQuery=mysqli_query($conn,$getorder);
                                      while ($rowOrders=mysqli_fetch_assoc($orderQuery)) {
                                        $orderId=$rowOrders['order_id'];
                                        $orderAmount=$rowOrders['amount_due'];
                                        $orderTotal=$rowOrders['total_products'];
                                        $orderInvoice=$rowOrders['invoice_number'];
                                        $orderStatus=$rowOrders['order_status'];
                                        $orderStatus=$rowOrders['order_status'];
                                        $orderDate=$rowOrders['order_date'];
                                        $num=1;
                                          echo "
                                          <tr>
                                          <td>$num</td>
                                          <td>$orderId</td>
                                          <td>$orderAmoung</td>
                                            <td>$orderTotal</td>
                                            <td>$orderInvoice</td>
                                            <td>$orderDate</td>
                                            <td>sample</td>
                                            <td>sample</td>
                                          </tr>"  ;
                                          $num++;
                                      }
                                      */?>