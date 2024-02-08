<?php
include('../../include/connection.php');

    function getDBData(){
        global $conn;
    
        $ip = getIPAddress();
       $total=0;
        $selectCart="SELECT * FROM cart_details WHERE ip_address='$ip'";
        $res_query=mysqli_query($conn,$selectCart);
       while ($row=mysqli_fetch_array($res_query)) {
  $proId=$row['product_id'];
  $selProd="SELECT * FROM products WHERE product_id='$proId'";
  $res=mysqli_query($conn,$selProd);
  while ($rowProdPrice=mysqli_fetch_array($res)) {
  $prodTotal=array($rowProdPrice['product_price']);
  $prodVal=array_sum($prodTotal);
    $total+=$prodVal;
  }
       }
  echo $total;
  
      }
      ?>
    
   