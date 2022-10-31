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
    if(!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL){
        echo "<script>window.location = 'postlist.php';</script>";
    }
    else{
        $postid = $_GET['delpostid'];
        $query = "select * from post where id='$postid'";
        $getdata = $db->select($query);
        if($getdata){
            while($delimg = $getdata->fetch_assoc()){
                $dellink = $delimg['image'];
                unlink($dellink); 
            }
        }
        $delquery = "delete from post where id='$postid'";
        $deldata = $db->delete($delquery);
        if($deldata){
            echo "<script>alert('Data Deleted Successfully.');</script>";
            echo "<script>window.location = 'postlist.php';</script>";
        }
        else{
            echo "<script>alert('Data is not deleted.');</script>";
            echo "<script>window.location = 'postlist.php';</script>";
        }
    }
?>
