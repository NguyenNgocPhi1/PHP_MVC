<?php
  include 'inc/header.php';
?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.php -->
<?php
  include 'inc/nav.php';
?>
<?php
	include '../classes/category.php';
?>
<?php
  	$cat = new category();
  	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delcat = $cat->delete_category($id);
	}
  
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          	<div class="row">
				<div class="row-md-6">
					<h2>Category List</h2>
				</div>  
			</div>
				<?php
                  if(isset($delcat)){
                    echo $delcat;	
                  }
                ?> 
                    <table class="table" id="example">
					<thead>
						<tr class="table-warning">
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						
						<?php
							$i1 = 0;
							$src = "table-success";
							$show_cat = $cat->show_category();
							if(isset($show_cat)){
								$i = 0;
								while($result = $show_cat->fetch_assoc()){
									$i++;
									$i1++;
									$src = "table-success";
									if ($i1 % 2 == 0)
									{
										$src = "table-primary";
									}
							
						?>
						
						<tr class="<?php echo $src;?>">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catname'];?></td>
							<td><a class="btn btn-success" href="catedit.php?catid=<?php echo $result['catid'];?>">Edit</a>|<a class="btn btn-danger" onclick="return confirm('Are you want to delete ?')" href="?delid=<?php echo $result['catid'];?>">Delete</a></td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
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