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
	include '../classes/brand.php';
?>
<?php
  	$brand = new brand();
  	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		$delbrand = $brand->delete_brand($id);
	}
  
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
				<div class="row">
					<div class="row-md-6">
						<h2>Brand List</h2>
					</div>  
				</div>
				<?php
                  if(isset($delbrand)){
                    echo $delbrand;	
                  }
                ?> 
                <table class="table" id="example">
					<thead>
						<tr class="table-warning">
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						
						<?php
							$i1 = 0;
							$src = "table-success";
							$show_brand = $brand->show_brand();
							if(isset($show_brand)){
								$i = 0;
								while($result = $show_brand->fetch_assoc()){
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
							<td><?php echo $result['brandname'];?></td>
							<td><a class="btn btn-success" href="brandedit.php?brandid=<?php echo $result['brandid'];?>">Edit</a>|<a class="btn btn-danger" onclick="return confirm('Are you want to delete ?')" href="?delid=<?php echo $result['brandid'];?>">Delete</a></td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
            </div>
         </div>
        <!-- main-panel ends -->
<?php
  include 'inc/footer.php';
?>