<?php 

require('../../../include/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnBrand'])) {


$_brand= $_POST['newBrand'];

$sqll="SELECT * FROM brand WHERE brand_name='$_brand'";
$sqll_res=mysqli_query($conn,$sqll);
$hello=mysqli_num_rows($sqll_res);
if ($hello>0) {
    header("Location: ../../../shopDashboard.php?brand=2");
    exit();
}

else{


$sql= "INSERT INTO brand (brand_name) VALUES ('$_brand')";
$query = mysqli_query($conn,$sql);
if ($query) {
    header("Location: ../../../shopDashboard.php?brand=1");
    
exit();
}
 else{
    $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
 }
}
}



?>