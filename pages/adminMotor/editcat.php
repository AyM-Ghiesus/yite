<?php 
include('../../include/connection.php');
?>
<?php
if (isset($_GET['editcat'])) {
    $editcat=$_GET['editcat'];

    $selectcat="SELECT * FROM category WHERE cat_id='$editcat'";
    $rescat=mysqli_query($conn,$selectcat);
    $rowcat=mysqli_fetch_assoc($rescat);
    $cattitle=$rowcat['category_name'];
    
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

<div class="register-box">
<div class="register-logo">
    
  </div>

  <div class="card">
    
    <div class="card-body register-card-body">
      <p class="login-box-msg">Update Category</p>

      <form action="" method="POST" >

      <!-- PRODUCT NAME -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Product Name" value="<?php echo $cattitle?>" autocomplete="off" required="required" name="cat">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        

        
        
        <div class="row">
          
          <!-- /.col -->
          
            <button type="submit" class="btn btn-primary btn-block" name="updatecat">Update Category</button>
          
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
    if (isset($_POST['updatecat'])) {
       $catName=$_POST['cat'];

       $update="UPDATE category SET category_name='$catName' WHERE cat_id='$editcat'";
        $upQ=mysqli_query($conn,$update);
        if ($upQ) {
            header("Location: viewBrands&Cat.php");
        }

    }
?>