<?php
	if(isset($_GET['pageid'])){
		$pagetitle = $_GET['pageid'];
		$query = "select * from page where id='$pagetitle'";
		$page = $db->select($query);
		if($page){
			while($result = $page->fetch_assoc()){

	?>
	<title><?php echo $result['name']; ?> - <?php echo TITLE; ?></title>
	<?php } } } 
	
	elseif(isset($_GET['id'])){
		$posttitle = $_GET['id'];
		$query = "select * from post where id='$posttitle'";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){

	?>
	<title><?php echo $result['title']; ?> - <?php echo TITLE; ?></title>
	<?php } } }
	
	else{ ?>
	<title><?php echo $fm->title()?> - <?php echo TITLE; ?></title>
	<?php } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about agriculture">

	<?php
	if(isset($_GET['id'])){
		$keyid = $_GET['id'];
		$query = "select * from post where id='$keyid'";
		$keyword = $db->select($query);
		if($keyword){
			while($result = $keyword->fetch_assoc()){

	?>

	<meta name="keywords" content="<?php echo $result['tag']; ?>">

	<?php } } }
	else{
	?>
	<meta name="keywords" content="<?php echo KEYWORDS; ?>">	
	<?php } ?>
	
	<meta name="author" content="Emon">