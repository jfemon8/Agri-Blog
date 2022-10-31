<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!Session::get('userRole')=='0'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>
	<div class="grid_10">
		<div class="box round first grid">
			<h2>Slider List</h2>
			<div class="block">  
				<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th width="10%">Serial No.</th>
						<th width="40%">Slider Title</th>
						<th width="35%">Slider Image</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query = "SELECT * FROM slider";
						$slider = $db->select($query);
						if($slider){
							$i=0;
							while($result = $slider->fetch_assoc()){
								$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['title']; ?></td>
						<td><img src="<?php echo $result['image']; ?>" height="100px" width="250px"/></td>
						<td>
							<?php if(Session::get('userRole')=='0'){ ?>
							   <a href="editslider.php?sliderid=<?php echo $result['id']; ?>"> Edit </a> || <a onclick="return confirm('Are you sure to Delete?');" href="deleteslider.php?delsliderid=<?php echo $result['id']; ?>"> Delete </a>
							 <?php } ?>
							</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>

			</div>
		</div>
	</div>
	
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>

<?php include 'inc/footer.php';?>
