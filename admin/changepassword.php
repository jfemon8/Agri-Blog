<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $userid = Session::get('userId');
    $userrole = Session::get('userRole');
?>

    <div class="grid_10">
    
        <div class="box round first grid">
            <h2>Change Password</h2>

            <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $password = mysqli_real_escape_string($db->link, md5($_POST['password']));
                
                        $query = "UPDATE user SET password='$password' where id='$userid'";
                        $updated_row = $db->update($query);
                        if ($updated_row) {
                            echo "<span style='color: green; font-size: 18px;'>Password Updated Successfully.</span>";
                        }
                        else {
                            echo "<span style='color: red; font-size: 18px;'>Password is not Updated!</span>";
                        }
                    }
                ?>
            
            <div class="block">               
                <form action="" method="post">
                <table class="form">					
                    <tr> 
                        <td>
                            <label>New Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password..."  name="password" class="medium" required>
                        </td>
                    </tr>
                        <tr>
                        <td>
                            <label>Re-Type Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password Again..." name="password" class="medium" required>
                        </td>
                    </tr>
                        
                    
                        <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php';?>

    