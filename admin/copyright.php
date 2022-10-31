<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!Session::get('userRole')=='0'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>

    <div class="grid_10">
    
        <div class="box round first grid">
            <h2>Update Copyright Text</h2>

            <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                $cr = $fm->validation($_POST['copyright']);

                $cr = mysqli_real_escape_string($db->link, $cr);

                if($cr==""){
                    echo("<span style='color: red; font-size: 18px;'>Field must not be empty.</span>");
                    }
                else{
                    $query = "UPDATE footer SET copyright='$cr' WHERE id='1'";
                    $updated_row = $db->update($query);
                    if ($updated_row) {
                        echo "<span class='success'>Copyright Updated Successfully.</span>";
                    }
                    else {
                        echo "<span class='error'>Copyright are not updated!</span>";
                    }
                }
            }
            ?>

            <div class="block copyblock"> 

            <?php 
                $query = "select * from footer where id='1'";
                $copy = $db->select($query);
                if($copy){
                    while($result = $copy->fetch_assoc()){
            ?>

                <form action="copyright.php" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" value="<?php echo $result['copyright'] ?>" name="copyright" class="large" />
                        </td>
                    </tr>
                    
                        <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
                </form>
            <?php } } ?>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php';?>
    