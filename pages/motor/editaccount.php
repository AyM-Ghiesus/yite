<?php 
               
  $user=$_SESSION['username'];
  $userimg="SELECT * FROM user_table WHERE username='$user'";
  $resImg=mysqli_query($conn,$userimg);
  $rowImg=mysqli_fetch_array($resImg);
  $userImage=$rowImg['user_image'];
                
  ?>
<?php 
if (isset($_GET['editaccount'])) {
 
$userSession=$_SESSION['username'];
$select="SELECT * FROM user_table WHERE username='$userSession'";
$resque=mysqli_query($conn,$select);
$rowfetch=mysqli_fetch_assoc($resque);
$user_id=$rowfetch['user_id'];
$user_name=$rowfetch['username'];
$user_email=$rowfetch['user_email'];
$user_address=$rowfetch['user_address'];
$user_mpbile=$rowfetch['user_mobile'];
}

if (isset($_POST['update'])) {
  $updateId=$user_id;
  $userName=$_POST['user_username'];
$userEmail=$_POST['user_email'];
$userAddress=$_POST['user_address'];
$userMobile=$_POST['user_contact'];
$newImg=$_FILES['user_image']['name'];
$newImgTemp=$_FILES['user_image']['tmp_name'];
move_uploaded_file($newImgTemp,"./userImage/$newImg");

//update
$updateData="UPDATE user_table SET username='$userName' ,user_email='$userEmail' ,user_image='$newImg' ,user_address='$userAddress' ,user_mobile='$userMobile'
WHERE user_id=$updateId";
$resquery=mysqli_query($conn,$updateData);
if ($resquery) {
  echo "<script>alert('User Data Is Updated')</script>"; 
  echo "<script>windows.open('logout.php','_self')</script>"; 
}


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .default{width: 400px;}

  </style>
</head>
<body>
  <h3 class="text-center mb-4">Edit Your Account </h3>
    <form action="" method="POST" enctype="multipart/form-data" class="text-center">
      <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name ?>" name="user_username">
      </div>

      <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
      </div>

      <div class="form-outline mb-4">
        <input type="file" class="form-control w-50 m-auto" name="user_image">
        <?php echo "<img src='./userImage/$userImage' alt='User Profile' class='default'> " ?>
      </div>

      <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
      </div>

      <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mpbile ?>" name="user_contact">
      </div>
      <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>

    </form>











</body>
</html>