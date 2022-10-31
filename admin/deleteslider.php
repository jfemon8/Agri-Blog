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
    if(!isset($_GET['delsliderid']) || $_GET['delsliderid'] == NULL){
        echo "<script>window.location = 'sliderlist.php';</script>";
    }
    else{
        $sliderid = $_GET['delsliderid'];
        $query = "select * from post where id='$sliderid'";
        $getdata = $db->select($query);
        if($getdata){
            while($delimg = $getdata->fetch_assoc()){
                $dellink = $delimg['image'];
                unlink($dellink); 
            }
        }
        $delquery = "delete from slider where id='$sliderid'";
        $deldata = $db->delete($delquery);
        if($deldata){
            echo "<script>alert('Slider Deleted Successfully.');</script>";
            echo "<script>window.location = 'sliderlist.php';</script>";
        }
        else{
            echo "<script>alert('Slider is not deleted.');</script>";
            echo "<script>window.location = 'sliderlist.php';</script>";
        }
    }
?>
