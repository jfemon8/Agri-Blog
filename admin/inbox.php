<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!Session::get('userRole')=='0' && !Session::get('userRole')=='1'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Inbox</h2>

            <?php
            if(isset($_GET['seenid'])){
                $seenid = $_GET['seenid'];
                $query = "UPDATE contact SET status='1' WHERE id='$seenid'";
                $updated_row = $db->update($query);
                if ($updated_row) {
                    echo "<span style='color: green; font-size: 18px;'>Message send in the Seen Box</span>";
                }
                else {
                    echo "<span style='color: red; font-size: 18px;'>Something went wrong!</span>";
                }
            }
            ?>

            <div class="block">        
                <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th width="5%">Serial No.</th>
                        <th width="20%">Name</th>
                        <th width="15%">Email</th>
                        <th width="30%">Message</th>
                        <th width="10%">Date</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $query = "select * from contact where status='0' order by id desc"; 
				$message = $db->select($query); 
				if($message){
					$i=0;
					while($result = $message->fetch_assoc()){
						$i++; 
				?>

                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $fm->textShorten($result['body'], 100); ?></td>
                        <td><?php echo $fm->formatDate($result['date']); ?></td>
                        <td><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> || <a href="replymsg.php?msgid=<?php echo $result['id']; ?>">Reply</a> || <a onclick="return confirm('Are you sure to move the message?')" href="?seenid=<?php echo $result['id']; ?>">Mark as Seen</a></td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>
            </div>
        </div>



        <div class="box round first grid">
            <h2>Seen Message</h2>

            <?php 
            if(isset($_GET['unseenid'])){
                $unseenid = $_GET['unseenid'];
                $query = "UPDATE contact SET status='0' WHERE id='$unseenid'";
                $updated_row = $db->update($query);
                if ($updated_row) {
                    echo "<span style='color: green; font-size: 18px;'>Message send in the Inbox</span>";
                }
                else {
                    echo "<span style='color: red; font-size: 18px;'>Something went wrong!</span>";
                }
            }
            ?>

            <?php
			if(isset($_GET['delid'])){
				$delid = $_GET['delid'];
				$delquery = "delete from contact where id='$delid'";
				$deldata = $db->delete($delquery);
				if($deldata){
					echo("<span style='color: green; font-size: 18px;'>Message deleted successfully.</span>"); 
				}
				else{
					echo("<span style='color: red; font-size: 18px;'>Message is not deleted.</span>");
				}
			}
			?>

            <div class="block">        
                <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th width="5%">Serial No.</th>
                        <th width="20%">Name</th>
                        <th width="15%">Email</th>
                        <th width="30%">Message</th>
                        <th width="10%">Date</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $query = "select * from contact where status='1' order by id desc"; 
				$message = $db->select($query); 
				if($message){
					$i=0;
					while($result = $message->fetch_assoc()){
						$i++; 
				?>
                    <tr class="odd gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $fm->textShorten($result['body'], 100); ?></td>
                        <td><?php echo $fm->formatDate($result['date']); ?></td>
                        <td><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> || <a onclick="return confirm('Are you sure to delete the message?')" href="?delid=<?php echo $result['id']; ?>">Delete</a> || <a href="?unseenid=<?php echo $result['id']; ?>">Mark as Unseen</a></td>
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
    