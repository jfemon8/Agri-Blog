<?php
include '../lib/Session.php';
Session::checkSession();
?>

<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>

<?php
	$db = new Database(); 
?>

<?php
    if(!isset($_GET['delpage']) || $_GET['delpage'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
    }
    else{
        $pageid = $_GET['delpage'];
        $delquery = "delete from page where id='$pageid'";
        $deldata = $db->delete($delquery);
        if($deldata){
            echo "<script>alert('page Deleted Successfully.');</script>";
            echo "<script>window.location = 'index.php';</script>";
        }
        else{
            echo "<script>alert('Page is not deleted.');</script>";
            echo "<script>window.location = 'index.php';</script>";
        }
    }
?>
