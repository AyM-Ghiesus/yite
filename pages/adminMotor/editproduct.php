<?php 
include('../../include/connection.php');
?>
<?php 
if (isset($_GET['editproduct'])) {
    $editProdId=$_GET['editproduct'];
    $getDatas="SELECT * FROM products WHERE product_id='$editProdId';";
    $resQuery=mysqli_query($conn,$getDatas);
    $rowData=mysqli_fetch_assoc($resQuery);
    $prodTitle=$rowData['product_name'];
    
    $prodDesc=$rowData['product_desc'];
    $prodKey=$rowData['product_key'];
    $prodCat=$rowData['cat_id'];
    $prodBrand=$rowData['brand_id'];
    $prodImg=$rowData['product_img'];
    $prodPrice=$rowData['product_price'];
    $prodStock=$rowData['stock'];


        //fetch cat
        $selectCat="SELECT * FROM category WHERE cat_id='$prodCat'";
        $resCat=mysqli_query($conn,$selectCat);
        $rowCat=mysqli_fetch_assoc($resCat);
        $catTitle=$rowCat['category_name'];
        
        //fetch brand
        $selectBrand="SELECT * FROM brand WHERE brand_id='$prodBrand'";
        $resBrand=mysqli_query($conn,$selectBrand);
        $rowBrand=mysqli_fetch_assoc($resBrand);
        $brandTitle=$rowBrand['brand_name'];
        

}
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
          ?> | Registration Page</title>

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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <style>
.productImg{
    width: 170px;
    align-items: center;
    
}

   </style>
</head>
<body class="hold-transition register-page">
  <!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

<div class="register-box">
  
<div class="register-logo">
    <img src="../layout/productImages/<?php echo $prodImg?>" class="productImg" alt="">
  </div>

  <div class="card">
    
    <div class="card-body register-card-body">
      <p class="login-box-msg">Edit Your Product</p>

      <form action="" method="POST" enctype="multipart/form-data">

      <!-- PRODUCT NAME -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Product Name" value="<?php echo $prodTitle?>" autocomplete="off" required="required" name="prodname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <!-- PRODUCT DESC -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Product Descriptions" value="<?php echo $prodDesc?>" autocomplete="off" required="required" name="proddesc">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <!-- PRODUCT STOCKS -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Stocks" value="<?php echo $prodStock?>" autocomplete="off" required="required" name="stocks">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- PRODUCT KEYS -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Product Keys" value="<?php echo $prodKey?>" autocomplete="off" required="required" name="prodkeys">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- CATEGORY -->
        <div class="input-group mb-3">
          <select name="prodcat" class="form-select">
          <option><?php echo $catTitle?></option>
          <?php 
          $selectCatAll="SELECT * FROM category";
          $resCatAll=mysqli_query($conn,$selectCatAll);           
          while ($rowCall=mysqli_fetch_assoc($resCatAll)) {
            $catName=$rowCall['category_name'];
            $catId=$rowCall['cat_id'];
            echo "<option value'$catId'> $catName </option>";
          }
          ?>
          </select>
        </div>

        <!-- BRAND -->
        <div class="input-group mb-3">
          <select name="prodbrand" class="form-select">
          <option><?php echo $brandTitle?></option>
          <?php 
          $selectBrandAll="SELECT * FROM brand";
          $resBrandAll=mysqli_query($conn,$selectBrandAll);           
          while ($rowBCall=mysqli_fetch_assoc($resBrandAll)) {
            $brandName=$rowBCall['brand_name'];
            $brandId=$rowBCall['brand_id'];
            echo "<option value'$brandId'> $brandName </option>";
          }
          ?>
          </select>
        </div>

        <!-- PRODUCT IMAGE -->
        <div class="input-group mb-3">
            
          <input type="file" class="form-control"  autocomplete="off" required="required" name="prodimage">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-house-user"></span>
            </div>
          </div>
        </div>

        <!-- PRICE -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Update Price" value="<?php echo $prodPrice?>" autocomplete="off" required="required" name="prodprice">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <!-- /.col -->
          
            <button type="submit" class="btn btn-primary btn-block" name="updateProd">Update Product</button>
           
          <!-- /.col -->
        </div>
      </form>

      

      
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
    if (isset($_POST['updateProd'])) {
        $prod_title=$_POST['prodname'];
        $prod_desc=$_POST['proddesc'];
        $prod_key=$_POST['prodkeys'];
        $prod_cat=$_POST['prodcat'];
        $prod_brand=$_POST['prodbrand'];
        $prod_price=$_POST['prodprice'];
        $prod_stock=$_POST['stocks'];
        $prod_imgg=$_FILES['prodimage']['name'];
        $prod_img_temp=$_FILES['prodimage']['tmp_name'];

        if ($prod_title=='' or $prod_desc =='' or $prod_key =='' or $prod_cat =='' or $prod_brand =='' or $prod_price =='' or $prod_imgg =='') {
            echo "<script>alert('Please lagyan mo lahat para wala error hehe')</script>";
        }else{
            move_uploaded_file($prod_img_temp,"../layout/productImages/$prod_imgg");

            //update
            $update="UPDATE products SET cat_id='$catId',stock=$prod_stock,brand_id='$brandId',product_name='$prod_title',
            product_desc='$prod_desc',product_key='$prod_key',product_img='$prod_imgg',product_price='$prod_price',date=NOW() WHERE product_id='$editProdId'";
            $resUpdate=mysqli_query($conn,$update);
            if ($resUpdate) {
                echo "<script>alert('naupdate na')</script>";
                echo "<script>windows.open('viewProducts.php','_self')</script>";
            }
        }
    }
?>