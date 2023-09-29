<?php
  include 'inc/header.php';
?>
<div class="container-fluid page-body-wrapper">
<?php
  include 'inc/nav.php';
?>
<?php include '../classes/category.php' ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/product.php' ?>
<?php include_once '../helpers/format.php' ?>
<?php $fm = new Format();?>
<?php
  	$pd = new product();
  	if(isset($_GET['productid'])){
		$id = $_GET['productid'];
		$delproduct = $pd->delete_product($id);
	}
  
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
			<div class="row-md-6">	
				<h2 style="text-align: center">Product List</h2>
			</div>  
		</div>
		<?php
			if(isset($delproduct)){
				echo $delproduct;
			}
		?>
        <table class="table table-bordered table-striped" id="example">
			<thead>
				<tr class="table-warning">
					<th>ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>		
				<?php
					$pd = new product();
					
					$pdlist = $pd->show_product();
					$i1 = 0;
					$src = "table-success";
					if($pdlist){
						$i = 0;
						while($result = $pdlist->fetch_assoc()){
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
					<td><?php echo $result['productname'];?></td>
					<td><?php echo $result['price'];?></td>
					<td><img src="uploads/<?php  echo $result['image'];?>"></td>
					<td><?php echo $result['catid'];?></td>
					<td><?php echo $result['brandid'];?></td>
					<td><?php echo $fm->textShorten($result['productdesc'],0);?></td>
					<td><?php if($result['type'] == 0){
						echo 'Feathered';
					}else{
						echo 'Non-Feathered';
					} ?></td>
					<td><a class="btn btn-success" href="productedit.php?productid=<?php echo $result['productid'];?>">Edit</a>|<a class="btn btn-danger" onclick="return confirm('Are you want to delete ?')" href="?productid=<?php echo $result['productid'];?>">Delete</a></td>
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
<?php
  include 'inc/footer.php';
?>