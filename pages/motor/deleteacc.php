<?php 
session_start();
include('../../function/common_file.php');
include('../../include/connection.php');
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
          ?> | Delete Account</title>

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
    <a href="homeProducts.php"><b>Go Back</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
  
  <div class="card-body login-card-body">
      <p class="login-box-msg">Delete Your Account?</p>

      
      <form action="" method="POST">
      <div class="social-auth-links text-center mb-3">
       
        <a href="homeProducts.php" class="btn btn-block btn-primary">
          <i class="fas fa-backward mr-2"></i> No, Go Back!
        </a>
        
        <button type="submit" name="delete" class="btn btn-block btn-danger"><i class="fas fa-trash-alt mr-2"></i>  Yes, Delete My Account!</button>
      </div>
      <!-- /.social-auth-links -->
        <?php 
        $userSession=$_SESSION['username'];
        if (isset($_POST['delete'])) {
            $delData="DELETE FROM user_table WHERE username='$userSession'";
            $runDel=mysqli_query($conn,$delData);
            if ($runDel) {
                session_destroy();
                echo "<script>alert('Sad...Your Account Has Beenn Deleted')</script>"; 
                     
            }
        }
        ?>
      </form>
      
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
