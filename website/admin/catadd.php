
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
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catname = $_POST['catname'];
    $insertcat = $cat->insert_category($catname);
  }
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
                
               <div class="block copyblock"> 
               <?php
                  if(isset($insertcat)){
                    echo $insertcat;
                  }
                ?>
                 <form action="catadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catname" placeholder="Thêm danh mục sản phẩm..." class="medium" />
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