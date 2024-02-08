<?php 
 include '../../../include/connection.php';

 if (isset($_GET['orderid'])) {
    $orderId=$_GET['orderid'];
}

$selectCart="SELECT * FROM user_order WHERE order_id='$orderId'";
 $res_query=mysqli_query($conn,$selectCart);
while($row=mysqli_fetch_assoc($res_query)){
$tot=$row['total_products'];
 $price=$row['amount_due'];
 $name=$row['invoice_number'];
}

 
 

// Product Details 
$itemNumber = "sad"; 
$itemName = $tot; 
$itemPrice = $price;  
$currency = "PHP"; 

/* PayPal REST API configuration 
 * You can generate API credentials from the PayPal developer panel. 
 * See your keys here: https://developer.paypal.com/dashboard/ 
 */ 
define('PAYPAL_SANDBOX', TRUE); //TRUE=Sandbox | FALSE=Production 
define('PAYPAL_SANDBOX_CLIENT_ID', 'Ac4Z4mpTg_1_64m_qCGk3y9_5ghOyYOarYfjZTwYEFoKzDkxPg1Fs-bSDsFzZnNIvxRvZu1BWmtShXPi'); 
define('PAYPAL_SANDBOX_CLIENT_SECRET', 'ELiL1CQ4e7Qe6NEQLwC8ANHf6qkg4gSDIryLcL37tHhrqRLgVYxpKKsLv6S047FUmqlz7FJeDPtmGe2D'); 
define('PAYPAL_PROD_CLIENT_ID', 'Insert_Live_PayPal_Client_ID_Here'); 
define('PAYPAL_PROD_CLIENT_SECRET', 'Insert_Live_PayPal_Secret_Key_Here'); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', 'root');  
define('DB_NAME', 'motorshop'); 
 
?>