<?php 
session_start();
if(empty($_SESSION['admin_name']))
{
  header('location:pages/adminMotor/adminlogin.php');
}

include('include/connection.php');
?>
<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyShop | Dashboard</title>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/MotorLogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Modals -->

          <form action="./pages/motor/backend/insertcat.php" method="POST" id = "formcat">
            <div class="modal fade" id="category">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">New Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    <div class="form-group">
                      <label>Category</label>
                      <input type="text" class="form-control" name="newCat" id="newCat" placeholder="Category">
                    </div>
                    
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="btnCategory" id = "btnCategory" value = "Add Category">
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>

        <form action="./pages/motor/backend/insertbrand.php" method="POST" id = "form_new" >
            <div class="modal fade" id="brand">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">New Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value = "insert">
                    <div class="form-group">
                      <label>Brand</label>
                      <input type="text" class="form-control" name="newBrand" id="newBrand" placeholder="Brand">
                    </div>
                    
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="btnBrand"id = "btnBrand" value = "Add Brand">
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./pages/motor/homeProducts.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      

      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="././pages/motor/homeProducts.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MOTOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">My Motorshop</a>
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
               

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                My Shop
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="./shopDashboard.php" class="nav-link active">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="pages/adminMotor/viewProducts.php" class="nav-link">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p> Products</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="pages/adminMotor/viewBrands&Cat.php" class="nav-link">
                  <i class="fas fa-sticky-note nav-icon"></i>
                  <p>Brands and Categories</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="pages/adminMotor/index2.php" class="nav-link">
                  <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>Booked Appointments</p>
                </a>
              </li>
              <?php 
          if (!isset($_SESSION['admin_name'])) {
            echo '<li class="nav-item">
            <a href="pages/adminmotor/adminlogin.php" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
              <span class="badge badge-info right"></span>
              <p>Login</p>
            </a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a href="pages/adminmotor/adminLogout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <span class="badge badge-info right"></span>
              <p>Logout</p>
            </a>
          </li>';
          }          
          ?>
            </ul>
            
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Shop Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Shop Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clipboard-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Orders</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All Users</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
                
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
                <div class="#">
                    <a href="./pages/layout/insertProduct.php"><button type="button" class="btn btn-primary">Add Product</button></a>
                    
                <button type="submit" class="btn btn-secondary" name="btnAddBrand" data-toggle="modal" data-target="#category">Add Categories</button>
                

                <button type="button" class="btn btn-primary" name="btnAddBrand" data-toggle="modal" data-target="#brand">Add Brands</button>
                
                  </div>
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Some Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <?php 
                      
                      $getOrder="SELECT * FROM user_order ORDER BY rand() LIMIT 0,5";
                      $res=mysqli_query($conn,$getOrder);
                      $row=mysqli_num_rows($res);
                      echo "<tr>
                      <th>SL No.</th>
                      <th>Due Amount</th>
                      <th>Invoice Number</th>
                      <th>Total Products</th>
                      <th>Order Date</th>
                      <th>Status</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>" ;
                      
                      if ($row==0) {
                          echo'<script>Swal.fire({
                            title: "Orders",
                            text: "Kawawa Walang Laman",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Understood"
                          });
                          
                          
                          </script>'; 
                        
                      }else{
                        $num=0;
                        while ($row=mysqli_fetch_assoc($res)) {
                          $orderid=$row['order_id'];
                          $userid=$row['user_id'];
                          $amountdue=$row['amount_due'];
                          $invoice=$row['invoice_number'];
                          $totprod=$row['total_products'];
                          $orderdate=$row['order_date'];
                          $orderstat=$row['order_status'];
                          $num++;
                          echo "<tr>
                          <td>$num</td>"?>
                          
                          <td>₱<?php echo number_format($amountdue) ?></td>
                          <?php echo "
                          <td>$invoice</td>
                          <td>$totprod</td>
                          <td>$orderdate</td>
                          <td>$orderstat</td>
                          <td><a href='#' class='btn btn-danger btn-sm btn-delete'>
                          <i class='fas fa-trash'></i>
                          Delete
                      </a></td>
                        </tr>";
                        }
                      }
                      ?>
                    
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Payments Complete</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <?php 
                      
                      $getOrderr="SELECT * FROM user_payment";
                      $resr=mysqli_query($conn,$getOrderr);
                      $roww=mysqli_num_rows($resr);
                      echo "<tr>
                      <th>SL No.</th>
                      <th>Invoice Number</th>
                      <th>Amount</th>
                      <th>Payment Mode</th>
                      <th>Order Date</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>" ;
                      
                      if ($roww==0) {
                          echo'<script>Swal.fire({
                            title: "User Payments",
                            text: "Kawawa Walang Laman",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Understood"
                          });
                          
                          
                          </script>'; 
                        
                      }else{
                        $numm=0;
                        while ($roww=mysqli_fetch_assoc($resr)) {
                          $orderidd=$roww['order_id'];
                          $useridd=$roww['payment_id'];
                          $amountduee=$roww['amount'];
                          $invoicee=$roww['invoice_number'];
                          $totprodd=$roww['payment_mode'];
                          $orderdatee=$roww['date'];
                          
                          $numm++;
                          echo "<tr>
                          <td>$numm</td>
                          <td>$invoicee</td>" ?>
                          
                          <td>₱<?php echo number_format($amountduee) ?></td>
                          <?php echo "
                          <td>$totprodd</td>
                          <td>$orderdatee</td>
                          <td><a href='#' class='btn btn-danger btn-sm btn-delete'>
                          <i class='fas fa-trash'></i>
                          Delete
                      </a></td>
                        </tr>";
                        }
                      }
                      ?>
                    
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Payments</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->

          <div class="col-md-4">
            
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mentions</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            
            

            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Users</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <?php 
                      
                      $getOrderrr="SELECT * FROM user_table";
                      $resrrr=mysqli_query($conn,$getOrderrr);
                      $rowwww=mysqli_num_rows($resrrr);
                      
                      
                      if ($rowwww==0) {
                          echo'<script>Swal.fire({
                            title: "User Payments",
                            text: "Kawawa Walang Laman",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Understood"
                          });
                          
                          
                          </script>'; 
                        
                      }else{
                        $nummm=0;
                        while ($rowwww=mysqli_fetch_assoc($resrrr)) {
                          $user_id=$rowwww['user_id'];
                          $username=$rowwww['username'];
                          $email=$rowwww['user_email'];
                          $user_image=$rowwww['user_image'];
                          $user_address=$rowwww['user_address'];
                          $usermobile=$rowwww['user_mobile'];
                          
                          $nummm++;
                           echo "<ul class='products-list product-list-in-card '>
                           <li class='item'>
                             <div class='product-img'>
                               <img src='pages/motor/userImage/$user_image' alt='User Image' class='img-size-50'>
                             </div>
                             <div class='product-info'>
                               <a  class='product-title'>$username
                                 <span class='badge badge-warning float-right'>$usermobile</span></a>
                               <span class='product-description'>
                                 $email
                               </span>
                             </div>
                           </li>";
                        }
                       
                      }
                      ?>
                
                  <!-- /.item -->
                  
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Users</a>
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    
  <!-- /.content-wrapper -->

  
  <?php
  if ( isset($_GET['category']) && $_GET['category'] == 1 )
{
     // treat the succes case ex:
    
     echo '<script>Swal.fire({
      title: "Category",
      text: "Is added successfully",
      timer: 2500 
    });
    
    </script>'; 
    
}
?>

<?php
  if ( isset($_GET['category']) && $_GET['category'] == 2 )
{
     // treat the succes case ex:
    
     echo '<script>Swal.fire({
      title: "Category",
      text: "Is Already in the Database",
      timer: 2500 
    });
    
    </script>'; 
    
}
?>

<?php
  if ( isset($_GET['brand']) && $_GET['brand'] == 1 )
{
     // treat the succes case ex:
    
     echo '<script>Swal.fire({
      title: "Brand",
      text: "Is added successfully",
      timer: 2500
    });
    
    </script>'; 
    
}
?>

<?php
  if ( isset($_GET['brand']) && $_GET['brand'] == 2 )
{
     // treat the succes case ex:
    
     echo '<script>Swal.fire({
      title: "Brand",
      text: "Is Already in the Database",
      timer: 3000
    });
    
    </script>'; 
    
}
?>

<?php
  if ( isset($_GET['inserted']) && $_GET['inserted'] == 1 )
{
     // treat the succes case ex:
    
     echo '<script>Swal.fire({
      title: "Product",
      text: "Is added successfully",
      timer: 2500 
    });
    
    </script>'; 
    
}
?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  


  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="./shopDashboard.php">GearUpGarage</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>For</b> CaseStudy Only
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
