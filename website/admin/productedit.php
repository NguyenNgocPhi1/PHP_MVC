
<?php
  include 'inc/header.php';
?>
      <!-- partial -->
<div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.php -->
<?php
  include 'inc/nav.php';
?>
<?php include '../classes/category.php' ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/product.php' ?>
<?php
    $product = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] == null){
       echo "<script>window.location = 'productlist.php'</script>";
    }else{
        $id = $_GET['productid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $updateproduct = $product->update_product($_POST,$_FILES,$id);
    }
?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="row-md-12">
                                <?php
                                    if(isset($updateproduct)){
                                        echo $updateproduct;
                                    }
                                ?>
                                <?php
                                    $get_product_by_id = $product->getproductbyid($id);
                                    if($get_product_by_id){
                                        while($result_product = $get_product_by_id->fetch_assoc()){

                                ?>               
                                <form action="" method="post" enctype="multipart/form-data">
                                    <h2 style="text-align: center">Sửa sản phẩm</h2>
                                    <hr>
                                    <div class="form-group pb-2">
                                        <label>Name</label>
                                        <input type="text" value="<?php echo $result_product['productname']?>" name="productname" class="form-control" />
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Category</label>
                                        <select name="category" id="select" class="form-control">
                                            <option disabled selected>==Select Category===</option>
                                            <?php
                                                $cat = new category();
                                                $catlist = $cat->show_category();
                                                if($catlist){
                                                    while($result = $catlist->fetch_assoc()){
                                            ?>
                                            <option <?php if($result['catid'] == $result_product['catid']){ echo 'selected';} ?> value="<?php echo $result['catid'];?>"><?php echo $result['catname'];?></option>


                                            <?php
                                                }
                                                    }
                                            ?>                
                                        </select>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Brand</label>
                                        <select name="brand" id="select" class="form-control">
                                            <option disabled selected>==Select Brand===</option>
                                            <?php
                                                $brand = new brand();
                                                $brandlist = $brand->show_brand();
                                                if($brandlist){
                                                    while($result = $brandlist->fetch_assoc()){
                                            ?>
                                            <option <?php if($result['brandid'] == $result_product['brandid']){ echo 'selected' ;}?> value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?></option>
                                            <?php
                                                }
                                            }
                                            ?>      
                                        </select>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Description</label>
                                        <textarea  name="productdesc" class="tinymce" class="form-control"><?php echo $result_product['productdesc'];?></textarea>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Price</label>
                                        <input type="text" name="price" value="<?php echo $result_product['price'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group pb-2">
                                        <img src="uploads/<?php  echo $result_product['image'];?>" width="120">
                                        <input type="file" name="image" class="form-control"/>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Product Type</label>
                                        <select id="select" name="type">
                                        <option disabled selected>==Select Type===</option>
                                            <?php
                                                if($result_product['type'] == 0){

                                                
                                            ?>
                                            <option selected value="0">Featured</option>
                                            <option value="1">Non-Featured</option>
                                            <?php
                                                }else{
                                            ?>
                                            <option value="0">Featured</option>
                                            <option selected value="1">Non-Featured</option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    
                                </form>
                                <?php }}?>
                            </div>
                </div>
            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.php -->
          
          <!-- partial -->
</div>
        <!-- main-panel ends -->
<?php
  include 'inc/footer.php';
?>