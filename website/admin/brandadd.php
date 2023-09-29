
<?php
  include 'inc/header.php';
?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.php -->
<?php
  include 'inc/nav.php';
?>
<?php include '../classes/brand.php' ?>
<?php
  $brand = new brand();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brandname = $_POST['brandname'];
    $insertbrand = $brand->insert_brand($brandname);
  }
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm thương hiệu</h2>
                
               <div class="block copyblock"> 
               <?php
                  if(isset($insertbrand)){
                    echo $insertbrand;
                  }
                ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandname" placeholder="Thêm thương hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
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