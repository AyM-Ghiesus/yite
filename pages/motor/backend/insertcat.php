<?php 

require('../../../include/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnCategory'])) {


$_cat= $_POST['newCat'];

$sqll="SELECT * FROM category WHERE category_name='$_cat'";
$sqll_res=mysqli_query($conn,$sqll);
$hello=mysqli_num_rows($sqll_res);
if ($hello>0) {
    header("Location: ../../../shopDashboard.php?category=2");
    exit();
}
else{

$sql= "INSERT INTO category (category_name) VALUES ('$_cat')";
$query = mysqli_query($conn,$sql);
if ($query) {
    header("Location: ../../../shopDashboard.php?category=1");
    
exit();
}
 else{
    $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
 }
}
}



?>