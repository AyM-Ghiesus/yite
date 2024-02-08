<?php include('../../function/common_file.php');
session_start();?>
<?php 
if (!isset($_SESSION['username'])) {
}else{


$userName=$_SESSION['username'];
$getUser="SELECT * FROM user_table WHERE username='$userName'";
$resQuery=mysqli_query($conn,$getUser);
$rowFetch=mysqli_fetch_assoc($resQuery);
$userId=$rowFetch['user_id'];
}

?>



<?php 
if (isset($_POST['update_cart'])) {
  $update_val=$_POST['update_val'];
  $update_id=$_POST['update_quan'];
  $selectt="SELECT * FROM products WHERE product_id = '$update_id'";
  $res_queryy=mysqli_query($conn,$selectt);
  while ($roww=mysqli_fetch_assoc($res_queryy)) {
    
    $priceee=$roww['product_price'];
  } 
  $update="UPDATE cart_details SET quantity = '$update_val' , prod_total ='$update_val' * '$priceee'  WHERE product_id='$update_id'";
  $ud_query=mysqli_query($conn,$update);
  if ($ud_query) {
    header('location:cart.php');
  }



}
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
          ?> | Cart</title>

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
  <style>
.cartImg{
  width: 100px;
  height: 100px;
  
}

  </style>

  
</head>
<body class="hold-transition sidebar-mini">
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/MotorLogo.png" alt="MotorLogo" height="60" width="60">
  </div>
<div class="wrapper">
  <!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
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
            <a href="./shopProfile.php" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>My Profile</p>
            </a>
          </li>';
          }          
          ?>

          <li class="nav-item">
            <a href="./cart.php" class="nav-link active">
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
            <h1>Cart</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homeProducts.php">Home</a></li>
              <li class="breadcrumb-item active">Cart</li>
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
                <h3 class="card-title">All the products you added in your cart is stored here. </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" >
                <table id="example2" class="table table-bordered  text-center">
                  
                
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Product Image</th>
                    <th>Price Per Item</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                         
                              
                          $ip = getIPAddress();
                          $total=0;
                          $selectCart="SELECT * FROM cart_details WHERE ip_address='$ip'";
                          $res_query=mysqli_query($conn,$selectCart);
                          if(mysqli_num_rows($res_query) > 0){
                          while ($row=mysqli_fetch_assoc($res_query)) {
                          $proId=$row['product_id'];
                          $quann=$row['quantity'];
                          $price=$row['price'];
                          $selProd="SELECT * FROM products WHERE product_id='$proId'";
                          $res=mysqli_query($conn,$selProd);
                          
                          while ($rowProdPrice=mysqli_fetch_array($res)) {
                            $product_id_new=$rowProdPrice['product_id'];
                          
                          
                          $priceName=$rowProdPrice['product_name'];
                          $priceImg=$rowProdPrice['product_img'];

                          



                      ?>


                  <tr>
                    <td><?php echo $priceName?></td>
                    <td><img src="../layout/productImages/<?php echo $priceImg?>" alt="sample" class="cartImg"></td>
                    
                    <td>₱<?php echo number_format($price)?></td>
                    <td>
                      <form action="" method="POST">
                      <input type="hidden" name="update_quan" value="<?php echo $proId; ?>">
                    <input type="number" min="1" name="update_val" value = "<?php echo $quann ?>" >
                    <button type="submit" class="btn btn-info btn-sm btn-edit" name="update_cart">
                              <i class="fas fa-pencil-alt"></i>
                              Update Cart
                          </button>
                      </form>
                        </td>
                    <td>₱<?php $tot_price = ($price * $quann); echo number_format($tot_price); ?></td>
                    <td>
                      
                      

                          <button type="submit" class="btn btn-danger btn-sm btn-delete" name="remove_cart">
                              <i class="fas fa-trash"></i>
                              Delete
                          </button>
                        <input type="checkbox" name="removeitem[]" value="<?php 
                        echo $proId;
                        ?>"></td>

                        
                  </tr>
                  <?php $total += $tot_price; 
                        
                      };
                    };
                  };
                ?>
                  </tfoot>
                  
                </table>
                <div><h4 class="px-3">Subtotal:<strong class="text-info"> ₱<?php echo number_format($total); ?></strong>
                
                  <a href="homeProducts.php"><button type="button" class="btn btn-primary px-1">Continue Shopping?</button></a>
                  <a href="checkout.php?userID=<?php echo $userId ?>"><button type="button" class="btn btn-info px-1">Checkout</button></a>
                  </h4>
                </div>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
            </form>
                    <?php 
                    function removeCart(){
                      global $conn;
                      if (isset($_POST['remove_cart'])) {
                       foreach ($_POST['removeitem'] as $removeItem) {
                        
                        $delQuery="DELETE FROM cart_details WHERE product_id=$removeItem";
                        $runDel=mysqli_query($conn,$delQuery);
                        if($runDel){
                          
                          echo '<script>Swal.fire({
                            title: "Item",
                            text: "Is Deleted From Your Cart",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Understood"
                          
                          });
                          
                          
                          </script>'; 
                          
                        }
                        
                       }
                      }

                    }
                    echo $remove_Item=removeCart();
                    
                    ?>
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
