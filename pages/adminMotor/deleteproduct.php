<?php 
include('../../include/connection.php');
?>
<?php 
if (isset($_GET['deleteproduct'])) {
    $editProdId=$_GET['deleteproduct'];
    $getDatas="SELECT * FROM products WHERE product_id='$editProdId';";
    $resQuery=mysqli_query($conn,$getDatas);
    $rowData=mysqli_fetch_assoc($resQuery);
    $prodTitle=$rowData['product_name'];
    
    $prodDesc=$rowData['product_desc'];
    $prodKey=$rowData['product_key'];
    $prodCat=$rowData['cat_id'];
    $prodBrand=$rowData['brand_id'];
    $prodImg=$rowData['product_img'];
    $prodPrice=$rowData['product_price'];


       
        

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
          ?> | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
<link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <style>
.productImg{
    width: 170px;
    align-items: center;
    
}

   </style>
</head>
<body class="hold-transition register-page">
  <!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<div class="register-box">
<div class="register-logo">
    <img src="../layout/productImages/<?php echo $prodImg?>" class="productImg" alt="">
  </div>

  <div class="card">
    
    <div class="card-body register-card-body">
      <p class="login-box-msg">Delete Product</p>

      <form action="" method="POST" enctype="multipart/form-data">

      <!-- PRODUCT NAME -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Product Name" value="<?php echo $prodTitle?>" autocomplete="off" required="required" name="prodname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- PRODUCT DESC -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Product Descriptions" value="<?php echo $prodDesc?>" autocomplete="off" required="required" name="proddesc">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        
        
        <div class="row">
          
          <!-- /.col -->
          
            <button type="submit" class="btn btn-danger btn-block" name="updateProd">Delete Product</button>
          
          <!-- /.col -->
        </div>
      </form>

      

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php 
    if (isset($_POST['updateProd'])) {
       $delete="DELETE FROM products WHERE product_id='$editProdId'";
       $delQuery=mysqli_query($conn,$delete);
       if ($delQuery) {
        echo "<script>alert('deleted na')</script>";
                header("Location: viewProducts.php");
       }

    }
?>