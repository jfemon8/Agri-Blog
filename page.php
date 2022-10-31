<?php include 'inc/header.php';?>

<?php
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
        header("Location:404.php");
    }
    else{
        $id = $_GET['pageid'];
    }
?>

<?php 
	$query = "select * from page where id='$id'";
	$addpage = $db->select($query);
	if($addpage){
		while($result = $addpage->fetch_assoc()){
?> 
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about"> 

				<h2><?php echo $result['name']; ?></h2>
	
				<p><?php echo $result['body']; ?></p>
				
			</div>
		</div>
		<?php 
			} 
		} 
		else{
			header("Location:404.php");
		}
		?>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>