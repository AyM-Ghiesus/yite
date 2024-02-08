<?php 
session_start();
if(empty($_SESSION['admin_name']))
{
  header('location:adminlogin.php');
}

include('../../include/connection.php');
?>
<?php include('../../include/connection.php');


        //fetch cat
        $selectCat="SELECT * FROM category";
        $resCat=mysqli_query($conn,$selectCat);
        $rowCat=mysqli_fetch_assoc($resCat);
        $catId=$rowCat['cat_id'];
        
        //fetch brand
        $selectBrand="SELECT * FROM brand";
        $resBrand=mysqli_query($conn,$selectBrand);
        $rowBrand=mysqli_fetch_assoc($resBrand);
        $brandId=$rowBrand['brand_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MOTOR | Category & Brands</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
 

  
</head>
<body class="hold-transition dark-mode sidebar-mini">
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/MotorLogo.png" alt="MotorLogo.png" height="60" width="60">
  </div>
<div class="wrapper">
  <!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
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
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../pages/motor/homeProducts.php" class="brand-link">
      <img src="../../dist/img/MotorLogo.png"
           alt="MotorLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                <a href="../../shopDashboard.php" class="nav-link">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="./viewProducts.php" class="nav-link">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p> Products</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="./viewBrands&Cat.php" class="nav-link active">
                  <i class="fas fa-sticky-note nav-icon"></i>
                  <p>Brands and Categories</p>
                </a>
              </li>
            </ul>
            
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="./index2.php" class="nav-link">
                  <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>Booked Appointments</p>
                </a>
              </li>

              <?php 
          if (!isset($_SESSION['admin_name'])) {
            echo '<li class="nav-item">
            <a href="adminlogin.php" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
              <span class="badge badge-info right"></span>
              <p>Logout</p>
            </a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a href="adminLogout.php" class="nav-link">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories and Brands</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../shopDashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Categories and Brands</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Category Name</th>
                    <th>Configure</th>
                    
                    
                  </tr>
                  </thead>
                    


                  <tbody>
                  <?php 
                        $selectCat="SELECT * FROM category";
                        $resCat=mysqli_query($conn,$selectCat);
                        $num=0;
                        while ($rowcat=mysqli_fetch_assoc($resCat)) {
                            $catId=$rowcat['cat_id'];
                            $catName=$rowcat['category_name'];
                            $num++;
                    ?>
                  <tr>
                    <td><?php echo $num ?></td>
                    <td> <?php echo $catName ?></td>
                    <td><a href="./editcat.php?editcat=<?php echo $catId?>" class='btn btn-info btn-sm btn-edit'>
                                 <i class='fas fa-pencil-alt'></i>
                                 Edit
                             </a>
                             <a href="./deletecat.php?deletecat=<?php echo $catId?>" class='btn btn-danger btn-sm btn-delete'>
                                 <i class='fas fa-trash'></i>
                                 Delete
                             </a></td>
                    
                    
                  </tr>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Brands</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Brand Name</th>
                    <th>Configure</th>
                    
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                        $selectbrand="SELECT * FROM brand";
                        $resbrand=mysqli_query($conn,$selectbrand);
                        $numm=0;
                        while ($rowbrand=mysqli_fetch_assoc($resbrand)) {
                            $brandId=$rowbrand['brand_id'];
                            $brandName=$rowbrand['brand_name'];
                            $numm++;
                    ?>
                  <tr>
                    <td><?php echo $numm ?></td>
                    <td> <?php echo $brandName ?></td>
                    <td><a href="./editbrand.php?editbrand=<?php echo $brandId?>" class='btn btn-info btn-sm btn-edit'>
                                 <i class='fas fa-pencil-alt'></i>
                                 Edit
                             </a>
                             <a href="./deletebrand.php?deletebrand=<?php echo $brandId?>" class='btn btn-danger btn-sm btn-delete'>
                                 <i class='fas fa-trash'></i>
                                 Delete
                             </a></td>
                    
                    
                  </tr>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <div class="float-right d-none d-sm-block">
      <b>For</b> CaseStudy Only
    </div>
    <strong>Copyright &copy; 2023 <a href="../../shopDashboard.php">GearUpGarage</a>.</strong> All rights reserved.
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
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

