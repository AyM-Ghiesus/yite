<?php 
include('../../include/connection.php');
include('../../function/common_file.php');
@session_start();
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
          ?> | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>GearUpGarage</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" autocomplete="off" required="required" name="user_name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required="required" name="user_pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me 
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <a href="#"><button type="submit" class="btn btn-primary btn-block" name="user_login">Sign In</button></a>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      
      <p class="mb-0">
        <a href="register.php" class="text-center">Register as a new member</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php 

if (isset($_POST['user_login'])) {
  $userName=$_POST['user_name'];
  $userPass=$_POST['user_pass'];
 
  $selectQuery="SELECT * FROM user_table WHERE username='$userName'";
  $res=mysqli_query($conn,$selectQuery);
  $rowCount=mysqli_num_rows($res);
  $rowData=mysqli_fetch_assoc($res);
  $userIp=getIPAddress();

  //cart item
  $cartQuery="SELECT * FROM cart_details WHERE ip_address='$userIp'";
  $cartSel=mysqli_query($conn,$cartQuery);
  $rowCart=mysqli_num_rows($cartSel);

  if ($rowCount>0) {
    $_SESSION['username']=$userName;
    if (password_verify($userPass,$rowData['user_password'])) {
      //echo "<script>alert('Login Success')</script>"; 
      if ($rowCount==1 AND $rowCart==0) {
        $_SESSION['username']=$userName;
        echo "<script>alert('Login Success')</script>"; 
        echo "<script>window.open('homeProducts.php','_self')</script>"; 
      }else{
        $_SESSION['username']=$userName;
        echo "<script>alert('Login Success')</script>"; 
        echo "<script>window.open('checkOutFinal.php','_self')</script>"; 
        
      }

    }else{
      echo "<script>alert('Invalid Credentials')</script>"; 
    }
  }else{
    echo "<script>alert('Invalid Credentials')</script>"; 

  }
}

?>