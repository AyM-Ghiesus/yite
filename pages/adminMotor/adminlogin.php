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
  <title>Admin | Log in</title>

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
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../motor/homeProducts.php" class="h1"><b>MOTOR</b> Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="adminname" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span  >
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="adminpass" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      
      <p class="mb-0">
        <a href="./adminregister.php" class="text-center">Register as a new Admin</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
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

if (isset($_POST['login'])) {
  $userName=$_POST['adminname'];
  $userPass=$_POST['adminpass'];
 
  $selectQuery="SELECT * FROM admin_table WHERE admin_name='$userName'";
  $res=mysqli_query($conn,$selectQuery);
  $rowCount=mysqli_num_rows($res);
  $rowData=mysqli_fetch_assoc($res);
  $userIp=getIPAddress();


  if ($rowCount>0) {
    $_SESSION['admin_name']=$userName;
    if (password_verify($userPass,$rowData['admin_pass'])) {
      //echo "<script>alert('Login Success')</script>"; 
      if ($rowCount==1) {
        $_SESSION['admin_name']=$userName;
        echo "<script>alert('Login Success')</script>"; 
        echo "<script>window.open('../../shopDashboard.php','_self')</script>"; 
      }else{
        $_SESSION['admin_name']=$userName;
        echo "<script>alert('Login Success')</script>"; 
        echo "<script>window.open('../../shopDashboard.php','_self')</script>"; 
        
      }

    }else{
      echo "<script>alert('Invalid Credentials')</script>"; 
    }
  }else{
    echo "<script>alert('Invalid Credentials')</script>"; 

  }
}

?>