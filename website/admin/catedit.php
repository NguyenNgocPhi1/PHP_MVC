
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
<?php
$cat = new category();
    if(!isset($_GET['catid']) || $_GET['catid'] == null){
       echo "<script>window.location = 'catlist.php'</script>";
    }else{
        $id = $_GET['catid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catname = $_POST['catname'];
        $updatecat = $cat->update_category($catname,$id);
    }
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="row">
            <div class="row-md-6">
                <h2>Sửa danh mục</h2>
                
               <div class="block copyblock"> 
               <?php
                  if(isset($updatecat)){
                    echo $updatecat;
                  }
                ?>
                <?php
                    $get_cat_name = $cat->getcatbyid($id);
                    if($get_cat_name){
                        while($result = $get_cat_name->fetch_assoc()){
                    
                ?>
                 <form action="" method="post">
                    <table class="form">			    		
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catname'];?>" name="catname" placeholder="Sửa danh mục sản phẩm..." class="medium" />
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