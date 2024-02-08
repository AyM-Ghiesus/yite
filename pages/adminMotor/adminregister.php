<?php 
include('../../include/connection.php');
include('../../function/common_file.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Registration</title>

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
</head>
<body class="hold-transition register-page">
  <!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>MOTOR</b> Admin</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register as admin</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" autocomplete="off" required="required" name="adminname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" autocomplete="off" required="required" name="adminemail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" autocomplete="off" required="required" name="adminpass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" autocomplete="off" required="required" name="adminConPass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="adminreg">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="./adminlogin.php" class="text-center">I'm an Admin already</a>
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
if (isset($_POST['adminreg'])) {
  $user=$_POST['adminname'];
  $email=$_POST['adminemail'];
  $pass=$_POST['adminpass'];
  $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
  $passCon=$_POST['adminConPass'];
  $userIP=getIPAddress();
 
  //AVOID SAME USERS
  $select_query="SELECT * FROM admin_table WHERE admin_name='$user' OR admin_email='$email'" ;
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
  

  $insert_query="INSERT INTO admin_table (admin_name,admin_email,admin_pass,admin_ip)
  VALUES ('$user','$email','$pass_hash','$userIP')";
$sqlExe=mysqli_query($conn,$insert_query);

if ($sqlExe) {
  echo '<script>Swal.fire({
    title: "CONGRATULATION",
    text: "You are now a registered Admin of MOTOR",
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Understood"
  });
  
  
  </script>'; 
  echo "<script>windows.open('./adminlogin.php','_self')</script>";
}else{

  die("Connection failed: " . mysqli_connect_error());
}

}




}

?>
