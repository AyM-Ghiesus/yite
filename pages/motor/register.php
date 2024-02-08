<?php 
include('../../include/connection.php');
include('../../function/common_file.php');
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
</head>
<body class="hold-transition register-page">
  <!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<div class="register-box">
  <div class="register-logo">
    <a href="homeProducts.php"><b>GearUpGarage</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="POST" enctype="multipart/form-data">

      <!-- USERNAME -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" autocomplete="off" required="required" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- EMAIL -->
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" autocomplete="off" required="required" name="useremail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <!-- PASSWORD -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" autocomplete="off" required="required" name="userpass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- RETYPE PASSWORD -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" autocomplete="off" required="required" name="userConpass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- USER IMAGE -->
        <div class="input-group mb-3">
          <input type="file" class="form-control form-control-sm" placeholder="User Image" required="required" name="userimage">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file-image"></span>
            </div>
          </div>
        </div>

        <!-- ADDRESS -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="House Address" autocomplete="off" required="required" name="useraddress">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-house-user"></span>
            </div>
          </div>
        </div>

        <!-- CONTACT NUMBER -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Contact Number" autocomplete="off" required="required" name="usercontact">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="user_register">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="login.php" class="text-center">I already have an account</a>
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
if (isset($_POST['user_register'])) {
  $user=$_POST['username'];
  $email=$_POST['useremail'];
  $pass=$_POST['userpass'];
  $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
  $passCon=$_POST['userConpass'];
  $address=$_POST['useraddress'];
  $contact=$_POST['usercontact'];
  $image=$_FILES['userimage']['name'];
  $imageTemp=$_FILES['userimage']['tmp_name'];
  $userIP=getIPAddress();

  //AVOID SAME USERS
  $select_query="SELECT * FROM user_table WHERE username='$user' OR user_email='$email'" ;
  $result=mysqli_query($conn,$select_query);
  $rowsCount=mysqli_num_rows($result);
  if ($rowsCount>0) {
    echo '<script>Swal.fire({
      title: "SORRY",
      text: "The Username Or Email Already Exist.",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Understood"
    });
    
    
    </script>'; 
    echo "<script>windows.open('register.php','_self')</script>";
  }elseif ($pass!=$passCon) {
    echo '<script>Swal.fire({
      title: "SORRY",
      text: "Passwords Do Not Match.",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Understood"
    });
    </script>'
    
    ; 
    echo "<script>windows.open('register.php','_self')</script>";
  }
  
  
  else{


  //INSERTING DATAS
  move_uploaded_file($imageTemp,"./userImage/$image");

  $insert_query="INSERT INTO user_table (username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
  VALUES ('$user','$email','$pass_hash','$image','$userIP','$address','$contact')";
$sqlExe=mysqli_query($conn,$insert_query);

if ($sqlExe) {
  echo '<script>Swal.fire({
    title: "CONGRATULATION",
    text: "You are now a registered member of MOTOR",
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Understood"
  });
  
  
  </script>'; 
  echo "<script>windows.open('register.php','_self')</script>";
}else{

  die("Connection failed: " . mysqli_connect_error());
}

}

//SELECT CART
$select_cart="SELECT * FROM cart_details WHERE ip_address='$userIP'";
$resCart=mysqli_query($conn,$select_cart);
$rowCount=mysqli_num_rows($resCart);
if ($rowCount>0) {
  $_SESSION['username']=$user;

  
  echo "<script>alert('You Have Items In Your Cart')</script>"; 
  echo "<script>windows.open('checkout.php','_self')</script>";
}else{
  echo "<script>windows.open('homeProducts.php','_self')</script>";
}

}

?>