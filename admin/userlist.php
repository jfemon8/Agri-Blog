<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
	<div class="grid_10">
		<div class="box round first grid">
			<h2>User List</h2>

			<?php 
			if(isset($_GET['deluser'])){
				$delid = $_GET['deluser'];
				$delquery = "delete from user where id='$delid'";
				$deldata = $db->delete($delquery);
				if($deldata){
					echo("<span style='color: green; font-size: 18px;'>User deleted successfully.</span>"); 
				}
				else{
					echo("<span style='color: red; font-size: 18px;'>User is not deleted.</span>");
				}
			}
			?>

			<div class="block">        
				<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th width='10%'>Serial No.</th>
						<th width='15%'>Name</th>
                        <th width='10%'>Username</th>
                        <th width='20%'>Email</th>
                        <th width='20%'>Details</th>
                        <th width='10%'>Role</th>
						<th width='25%'>Action</th>
					</tr>
				</thead>
				<tbody>

				<?php $query = "select * from user order by id desc"; 
				$user = $db->select($query); 
				if($user){
					$i=0;
					while($result = $user->fetch_assoc()){
						$i++; 
				?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['username']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $fm->textShorten($result['details'], 50); ?></td>

                        <td>
                            <?php
                                if($result['role']=='0'){
                                    echo "Admin";
                                } 
                                elseif($result['role']=='1'){
                                    echo "Author";
                                } 
                                elseif($result['role']=='2'){
                                    echo "Editor";
                                } 
                                else{
                                    echo "No role assigned!";
                                }
                             ?>
                        </td>

						<td><a href="viewuser.php?userid=<?php echo $result['id']; ?>">View User</a>
                        <?php
                            if(Session::get('userRole')=='0'){
                        ?>
                        || <a onclick="return confirm('Are you sure to Delete?');" href="?deluser=<?php echo $result['id']; ?>">Delete</a>
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

