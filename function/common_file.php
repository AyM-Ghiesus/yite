<?php 

include('../../include/connection.php');

function getProduct(){
    
    global $conn;

    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){

    $select="SELECT * FROM products order by rand() limit 0,9 ";
    $res_query=mysqli_query($conn,$select);
    while ($row=mysqli_fetch_assoc($res_query)) {
      $prod_id=$row['product_id'];
      $prod_name=$row['product_name'];
$prod_desc=$row['product_desc'];
$prod_key=$row['product_key'];
$prod_img=$row['product_img'];
$prod_price=$row['product_price'];
$prod_stock=$row['stock'];
$prod_catId=$row['cat_id'];
$prod_brandId=$row['brand_id'];

if ($prod_stock==0) {
  echo "<div class='col-md-4'>

<div class='card' >
  <img src='../layout/productImages/$prod_img' class='card-img-top' alt='$prod_name'>
    <div class='card-body'>
    <h5 class='card-title'>$prod_name</h5>
    <p class='card-text'>$prod_desc</p>
    <p class='card-text'>Out of Stock</p>"?>
     
    <p class="card-text">Price: ₱<?php echo number_format($prod_price) ?></p>
    <?php echo "   
    <a href='homeProducts.php?addToCart=$prod_id' class='btn btn-secondary'>Add To Cart</a>
    <a href='viewMore.php?productId=$prod_id' class='btn btn-info'>View More Details</a>
</div>
</div>

</div>";
}else{
echo "<div class='col-md-4'>

<div class='card' >
  <img src='../layout/productImages/$prod_img' class='card-img-top' alt='$prod_name'>
    <div class='card-body'>
    <h5 class='card-title'>$prod_name</h5>
    <p class='card-text'>$prod_desc</p>
    <p class='card-text'>Available Stocks: $prod_stock</p>"?>
     
    <p class="card-text">Price: ₱<?php echo number_format($prod_price) ?></p>
    <?php echo "   
    <a href='homeProducts.php?addToCart=$prod_id' class='btn btn-secondary'>Add To Cart</a>
    <a href='viewMore.php?productId=$prod_id' class='btn btn-info'>View More Details</a>
</div>
</div>

</div>";
}
    }
    }
  }
}
?>
<?php
function getSpeCat(){
    
  global $conn;

  if(isset($_GET['category'])){
    $prod_catId=$_GET['category'];
    

  $select="SELECT * FROM products WHERE cat_id=$prod_catId";
  $res_query=mysqli_query($conn,$select);
  $numRows=mysqli_num_rows($res_query);
  if ($numRows==0) {
    echo '<script>Swal.fire({
      title: "Category",
      text: "Is Not Yet Available",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Understood"
    });
    
    
    </script>'; 
  }
  while ($row=mysqli_fetch_assoc($res_query)) {
    $prod_id=$row['product_id'];
    $prod_name=$row['product_name'];
$prod_desc=$row['product_desc'];
$prod_key=$row['product_key'];
$prod_img=$row['product_img'];
$prod_stock=$row['stock'];
$prod_price=$row['product_price'];
$prod_catId=$row['cat_id'];
$prod_brandId=$row['brand_id'];

echo "<div class='col-md-4'>

<div class='card' >
<img src='../layout/productImages/$prod_img' class='card-img-top' alt='$prod_name'>
  <div class='card-body'>
  <h5 class='card-title'>$prod_name</h5>
  <p class='card-text'>$prod_desc</p>
  <p class='card-text'>Available Stocks: $prod_stock</p>
  <p class='card-text'>Price: ₱$prod_price</p>
  <a href='homeProducts.php?addToCart=$prod_id' class='btn btn-secondary'>Add To Cart</a>
  <a href='viewMore.php?productId=$prod_id' class='btn btn-info'>View More Details</a>
</div>
</div>

</div>";

  }
  
}
}

function getSpeBrand(){
    
  global $conn;

  if(isset($_GET['brand'])){
    $prod_brandId=$_GET['brand'];
    

  $select="SELECT * FROM products WHERE brand_id=$prod_brandId";
  $res_query=mysqli_query($conn,$select);
  $numRows=mysqli_num_rows($res_query);
  if ($numRows==0) {
    echo '<script>Swal.fire({
      title: "Brand",
      text: "Is Not Yet Available",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Understood"
    });
    
    
    </script>'; 
  }
  while ($row=mysqli_fetch_assoc($res_query)) {
    $prod_id=$row['product_id'];
    $prod_name=$row['product_name'];
$prod_desc=$row['product_desc'];
$prod_key=$row['product_key'];
$prod_img=$row['product_img'];
$prod_stock=$row['stock'];
$prod_price=$row['product_price'];
$prod_catId=$row['cat_id'];
$prod_brandId=$row['brand_id'];

echo "<div class='col-md-4'>

<div class='card' >
<img src='../layout/productImages/$prod_img' class='card-img-top' alt='$prod_name'>
  <div class='card-body'>
  <h5 class='card-title'>$prod_name</h5>
  <p class='card-text'>$prod_desc</p>
  <p class='card-text'>Available Stocks: $prod_stock</p>
  <p class='card-text'>Price: ₱$prod_price</p>
  <a href='homeProducts.php?addToCart=$prod_id' class='btn btn-secondary'>Add To Cart</a>
  <a href='viewMore.php?productId=$prod_id' class='btn btn-info'>View More Details</a>
</div>
</div>

</div>";

  }
  
}
}

function getBrand(){
  global $conn;
  $sel_brand="SELECT * FROM brand";
  $res_brand=mysqli_query($conn,$sel_brand);
  //$row_data=mysqli_fetch_assoc($res_brand);
  //echo $row_data['brand_name'];
  
  while ($row_data=mysqli_fetch_assoc($res_brand)) {
    $b_name=$row_data['brand_name'];
    $b_id=$row_data['brand_id'];
    echo "<li class='navbar-nav '>
    <a href='../motor/homeProducts.php?brand=$b_id' class='nav-link text-light'><h4>$b_name</h4></a>
    
  </li> ";
  
  }
  
}

function getCategory(){
    
  global $conn;
  $sel_cat="SELECT * FROM category";
  $res_cat=mysqli_query($conn,$sel_cat);
  //$row_data=mysqli_fetch_assoc($res_brand);
  //echo $row_data['brand_name'];
  
  while ($row_data=mysqli_fetch_assoc($res_cat)) {
    $c_name=$row_data['category_name'];
    $c_id=$row_data['cat_id'];
    echo "<li class='navbar-nav '>
    <a href='../motor/homeProducts.php?category=$c_id' class='nav-link text-light'><h4>$c_name</h4></a>
    
  </li> ";
  
  }


}

function searchProd(){
    
  global $conn;
if (isset($_GET['searchNow'])) {
  $searchData=$_GET['searchData'];


  $select="SELECT * FROM products WHERE product_key like '%$searchData%'";
  $res_query=mysqli_query($conn,$select);
  $numRows=mysqli_num_rows($res_query);
  if ($numRows==0) {
    echo '<script>Swal.fire({
      title: "Keyword",
      text: "Does not match anything",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Understood"
    });
    
    
    </script>'; 
  }
  while ($row=mysqli_fetch_assoc($res_query)) {
    $prod_id=$row['product_id'];
    $prod_name=$row['product_name'];
$prod_desc=$row['product_desc'];
$prod_key=$row['product_key'];
$prod_img=$row['product_img'];
$prod_stock=$row['stock'];
$prod_price=$row['product_price'];
$prod_catId=$row['cat_id'];
$prod_brandId=$row['brand_id'];

echo "<div class='col-md-4'>

<div class='card' >
<img src='../layout/productImages/$prod_img' class='card-img-top' alt='$prod_name'>
  <div class='card-body'>
  <h5 class='card-title'>$prod_name</h5>
  <p class='card-text'>$prod_desc</p>
  <p class='card-text'>Available Stocks: $prod_stock</p>
  <p class='card-text'>Price: ₱$prod_price</p>
  <a href='homeProducts.php?addToCart=$prod_id' class='btn btn-secondary'>Add To Cart</a>
  <a href='viewMore.php?productId=$prod_id' class='btn btn-info'>View More Details</a>
</div>
</div>

</div>";

  }
}
}

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  

function cart(){
if (isset($_GET['addToCart'])) {
  global $conn;

  $ip = getIPAddress();
  $getProdId=$_GET['addToCart'];
  $selectCart="SELECT * FROM cart_details WHERE ip_address='$ip' and product_id=$getProdId";
  $res_query=mysqli_query($conn,$selectCart);
  $numRows=mysqli_num_rows($res_query);
  if ($numRows>0) {
    echo '<script>Swal.fire({
      title: "Item",
      text: "Is already in the cart",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Understood"
    });
    
    
    </script>'; 
    

  }else{
    $select="SELECT * FROM products WHERE product_id = '$getProdId'";
  $res_query=mysqli_query($conn,$select);
  while ($row=mysqli_fetch_assoc($res_query)) {
    $prodname=$row['product_name'];
    $proddesc=$row['product_desc'];
    $price=$row['product_price'];
    $stock=$row['stock'];
  }
  if ($stock == 0) {
    echo '<script>Swal.fire({
      title: "Item",
      text: "Is out of stock",
      
      
    });
    
    
    </script>'; 
  }else{

    $insertCart="INSERT INTO cart_details (product_id,product_name,product_desc,price,ip_address,quantity,prod_total)
    VALUES($getProdId,'$prodname','$proddesc',$price,'$ip',1,1*'$price')";
$res_query=mysqli_query($conn,$insertCart);
echo '<script>Swal.fire({
  title: "Item",
  text: "Is Added In The Cart",
  confirmButtonColor: "#3085d6",
  confirmButtonText: "Understood"
});


</script>'; 

  }
  }

}

}


function cartItems(){
  if (isset($_GET['addToCart'])) {
    global $conn;
  
    $ip = getIPAddress();
   
    $selectCart="SELECT * FROM cart_details WHERE ip_address='$ip'";
    $res_query=mysqli_query($conn,$selectCart);
    $countItems=mysqli_num_rows($res_query);
 
    }else{
      global $conn;
      $ip = getIPAddress();
      $insertCart="SELECT * FROM cart_details WHERE ip_address = '$ip'";
  $res_query=mysqli_query($conn,$insertCart);
  $countItems=mysqli_num_rows($res_query);
  
  
    }
  echo $countItems;
  }
  
  function totalcartPrice(){
    
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
  
//get user order details

function getUserOrder(){
global $conn;
$username=$_SESSION['username'];
$getDetails="SELECT * FROM user_table WHERE username='$username'";
$resQuery=mysqli_query($conn,$getDetails);

while ($rowQuery=mysqli_fetch_array($resQuery)) {
  
  $userId=$rowQuery['user_id'];
  if(!isset($_GET['editaccount'])){
    if(!isset($_GET['myorders'])){
      if(!isset($_GET['deleteaccount'])){
        $getOrder="SELECT * FROM user_order WHERE user_id=$userId AND order_status='pending'" ;
        $resOrder=mysqli_query($conn,$getOrder);
        $rowCount=mysqli_num_rows($resOrder); 
        if ($rowCount > 0) {
          echo "<h3 class='text-center'>You Have <span class='text-danger'>$rowCount</span> Pending Orders</h3>
          <p class='text-center'> <a href=user_order.php>Order Details</a></p>";
         
        }else{
          echo "<h3 class='text-center'>You Have <span class='text-danger'>0</span> Pending Orders</h3>
          <p class='text-center'> <a href=homeProducts.php>Shop Now</a></p>";
        }
      }
      
    }
  }
}




}
   
         




?>