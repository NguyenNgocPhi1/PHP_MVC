
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
    if(!isset($_GET['brandid']) || $_GET['brandid'] == null){
       echo "<script>window.lobrandion = 'brandlist.php'</script>";
    }else{
        $id = $_GET['brandid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandname = $_POST['brandname'];
        $updatebrand = $brand->update_brand($brandname,$id);
    }
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="row">
            <div class="row-md-6">
                <h2>Sửa thương hiệu</h2>
                
               <div class="block copyblock"> 
               <?php
                  if(isset($updatebrand)){
                    echo $updatebrand;
                  }
                ?>
                <?php
                    $get_brand_name = $brand->getbrandbyid($id);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){
                    
                ?>
                 <form action="" method="post">
                    <table class="form">			    		
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandname'];?>" name="brandname" placeholder="Sửa danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                        }
                    }
                    ?>
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