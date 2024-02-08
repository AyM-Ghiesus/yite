<?php 

include('../../function/common_file.php');
include('../../include/connection.php');

if (isset($_GET['user_id'])) {
    $userId=$_GET['user_id'];
    
}


//getting total items and total price of all items
$getIp=getIPAddress();
$totalPrice=0;
$cartQuery="SELECT * FROM cart_details WHERE ip_address='$getIp'";
$resCart=mysqli_query($conn,$cartQuery);
$invoiceNum=mt_rand();
$status="pending";
$countProducts=mysqli_num_rows($resCart);

$prodIds = [];
$quantities = [];

while ($rowPrice=mysqli_fetch_array($resCart)) {
   $prodId=$rowPrice['product_id'];
   $prodIds[] = $prodId;

   $selProd="SELECT* FROM products WHERE product_id=$prodId";
   $prodCart=mysqli_query($conn,$selProd);
    while ($rowProdPrice=mysqli_fetch_array($prodCart)) {
        $prodPrice=array($rowProdPrice['product_price']);
        $quantity = $rowPrice['quantity'];
        $quantities[$prodId] = $quantity;
      
    }

}

//getting quanti from cart
$getCart="SELECT * FROM cart_details WHERE product_id='$prodId'";
$runCart=mysqli_query($conn,$getCart);
while($getItemQuan=mysqli_fetch_array($runCart)){
$quantity=$getItemQuan['quantity'];
}
    

    $summ="SELECT SUM(prod_total)  AS quantity_summ FROM cart_details";
    $summq=mysqli_query($conn,$summ);
    $summrow=mysqli_fetch_assoc($summq);
    $summsum=$summrow['quantity_summ'];

    $sum="SELECT SUM(quantity)  AS quantity_sum FROM cart_details";
    $sumq=mysqli_query($conn,$sum);
    $sumrow=mysqli_fetch_assoc($sumq);
    $sumsum=$sumrow['quantity_sum'];

$insertQuery="INSERT INTO user_order (user_id,amount_due,invoice_number,total_products,order_date,order_status) 
VALUES ($userId,$summsum,$invoiceNum,$sumsum,NOW(),'$status')";
$resQuery=mysqli_query($conn,$insertQuery);
if ($resQuery) {
       header("Location: shopProfile.php");
}

//orders pending
$insertOrders="INSERT INTO orders_pending (user_id,invoice_number,product_id,quantity,order_status) 
VALUES ($userId,$invoiceNum,$prodId,$quantity,'$status')";
$resPending=mysqli_query($conn,$insertOrders);


//delete orders from cart
$delCart="DELETE FROM cart_details WHERE ip_address='$getIp'";
$resDel=mysqli_query($conn,$delCart);

foreach ($prodIds as $prodId) {
    $sample = "SELECT stock FROM products WHERE product_id ='$prodId'";
    $sampleq = mysqli_query($conn, $sample);

    while ($samfetch = mysqli_fetch_assoc($sampleq)) {
        $stock = $samfetch['stock'];

        // Calculate the new stock quantity
        $newStock = $stock - $quantities[$prodId];

        // Update the product stock
        $upd = "UPDATE products SET stock='$newStock' WHERE product_id ='$prodId'";
        $upda = mysqli_query($conn, $upd);
    }
}

?>