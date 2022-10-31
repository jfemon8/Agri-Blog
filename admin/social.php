<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if(!Session::get('userRole')=='0'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>

    <div class="grid_10">
    
        <div class="box round first grid">
            <h2>Update Social Media</h2>

            <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                $fb = $fm->validation($_POST['facebook']);
                $tw = $fm->validation($_POST['twitter']);
                $ln = $fm->validation($_POST['linkedin']);
                $gp = $fm->validation($_POST['google']);

                $fb = mysqli_real_escape_string($db->link, $fb);
                $tw = mysqli_real_escape_string($db->link, $tw);
                $ln = mysqli_real_escape_string($db->link, $ln);
                $gp = mysqli_real_escape_string($db->link, $gp);

                if($fb=="" || $tw=="" || $ln=="" || $gp==""){
                    echo("<span style='color: red; font-size: 18px;'>Field must not be empty.</span>");
                    }
                else{
                    $query = "UPDATE social SET facebook='$fb', twitter='$tw', linkedin='$ln', google='$gp' WHERE id='1'";
                    $updated_row = $db->update($query);
                    if ($updated_row) {
                        echo "<span class='success'>Social Media Link Updated Successfully.</span>";
                    }
                    else {
                        echo "<span class='error'>Social Media Link are not updated!</span>";
                    }
                }
            }
            ?>

            <div class="block"> 
                
            <?php 
                $query = "select * from social where id='1'";
                $socialmedia = $db->select($query);
                if($socialmedia){
                    while($result = $socialmedia->fetch_assoc()){
            ?>

                <form action="social.php" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <label>Facebook</label>
                        </td>
                        <td>
                            <input type="text" name="facebook" value="<?php echo $result['facebook']; ?>" class="medium" />
                        </td>
                    </tr>
                        <tr>
                        <td>
                            <label>Twitter</label>
                        </td>
                        <td>
                            <input type="text" name="twitter" value="<?php echo $result['twitter']; ?>" class="medium" />
                        </td>
                    </tr>
                    
                        <tr>
                        <td>
                            <label>LinkedIn</label>
                        </td>
                        <td>
                            <input type="text" name="linkedin" value="<?php echo $result['linkedin']; ?>" class="medium" />
                        </td>
                    </tr>
                    
                        <tr>
                        <td>
                            <label>Google Plus</label>
                        </td>
                        <td>
                            <input type="text" name="google" value="<?php echo $result['google']; ?>" class="medium" />
                        </td>
                    </tr>
                    
                        <tr>
                        <td></td>
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

    