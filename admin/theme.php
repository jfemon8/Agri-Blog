<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!Session::get('userRole')=='0'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Themes</h2>
        <div class="block copyblock">
        
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
        $theme = $_POST['theme'];
        $theme = mysqli_real_escape_string($db->link, $theme); 
        
        $query = "UPDATE theme SET name='$theme' WHERE id='1'";
        $updated_row = $db->update($query);
        if($updated_row){
            echo("<span style='color: green; font-size: 18px;'>Theme updated successfully.</span>"); 
        }
        else{
            echo("<span style='color: red; font-size: 18px;'>Theme is not updated.</span>");
        }
        }
        ?>

<?php
    $query = "select * from theme where id='1'"; 
    $themes = $db->select($query);
    while($result = $themes->fetch_assoc()){
?>

            <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <input 
                        <?php if($result['name']=='default'){echo "checked";} ?> 
                        type="radio" name="theme" value="default" />Default
                    </td>
                </tr>
                <tr>
                    <td>
                        <input 
                        <?php if($result['name']=='selago'){echo "checked";} ?> 
                        type="radio" name="theme" value="selago" />Selago
                    </td>
                </tr>
                <tr>
                    <td>
                        <input 
                        <?php if($result['name']=='purple'){echo "checked";} ?> 
                        type="radio" name="theme" value="purple" />Purple
                    </td>
                </tr>
                <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Change Theme" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>
