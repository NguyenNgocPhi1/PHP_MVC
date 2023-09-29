
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
  $pd = new product();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    
    $insertpd = $pd->insert_product($_POST,$_FILES);
  }
?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="row-md-12">
                                <?php
                                    if(isset($insertpd)){
                                        echo $insertpd;
                                    }
                                ?>               
                                <form action="productadd.php" method="post" enctype="multipart/form-data">
                                    <h2 style="text-align: center">Thêm sản phẩm</h2>
                                    <hr>
                                    <div class="form-group pb-2">
                                        <label>Name</label>
                                        <input type="text" name="productname" placeholder="Enter Product Name..." class="form-control" />
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
                                            <option value="<?php echo $result['catid'];?>"><?php echo $result['catname'];?></option>
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
                                            <option value="<?php echo $result['brandid'];?>"><?php echo $result['brandname'];?></option>
                                            <?php
                                                }
                                            }
                                            ?>      
                                        </select>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Description</label>
                                        <textarea name="productdesc" class="tinymce" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Price</label>
                                        <input type="text" name="price" placeholder="Enter Price..." class="form-control" />
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Upload Image</label>
                                        <input type="file" name="image" class="form-control"/>
                                    </div>
                                    <div class="form-group pb-2">
                                        <label>Product Type</label>
                                        <select id="select" name="type">
                                        <option disabled selected>==Select Type===</option>
                                            <option value="0">Featured</option>
                                            <option value="1">Non-Featured</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                    
                                </form>
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