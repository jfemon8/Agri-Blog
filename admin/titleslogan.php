<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<style>
    .leftside{
        float: left;
        width: 70%;
    }
    .rightside{
        float: left;
        width: 20%;
    }
    .rightside img{
        margin-top: 10%;
        float: center;
        height: 70%;
        width: 90%;
    }
    .rightside a{
        color: rebeccapurple;

    }
</style>

<?php
    if(!Session::get('userRole')=='0'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>

    <div class="grid_10">
    
        <div class="box round first grid">
            <h2>Update Site Title and Description</h2>

            
<?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $title = $fm->validation($_POST['title']);
                $slogan = $fm->validation($_POST['slogan']);
                $title = mysqli_real_escape_string($db->link, $title);
                $slogan = mysqli_real_escape_string($db->link, $slogan);

                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['logo']['name'];
                $file_size = $_FILES['logo']['size'];
                $file_temp = $_FILES['logo']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $same_image = 'logo'.'.'.$file_ext;
                $uploaded_image = "upload/".$same_image;

                if($title=="" || $slogan==""){
                    echo("<span style='color: red; font-size: 18px;'>Field must not be empty.</span>");
                }
                else{
                    if(!empty($file_name)){
                        if ($file_size >2097134) {
                            echo "<span class='error'>Image Size should be less then 2MB!
                            </span>";
                        }
                        elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only: "
                            .implode(', ', $permited)."</span>";
                        }
                        else{
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = "UPDATE title_slogan SET title='$title', slogan='$slogan', logo='$uploaded_image' WHERE id='1'";
                            $updated_row = $db->update($query);
                            if ($updated_row) {
                                echo "<span class='success'>Title, Slogan and Logo Updated Successfully.</span>";
                            }
                            else {
                                echo "<span class='error'>Title, Slogan and Logo are not updated!</span>";
                            }
                        }
                    }
                    else{
                        $query = "UPDATE title_slogan SET title='$title', slogan='$slogan' WHERE id='1'";
                        $updated_row = $db->update($query);
                        if ($updated_row) {
                            echo "<span class='success'>Title and Slogan Updated Successfully.</span>";
                        }
                        else {
                            echo "<span class='error'>Title and Slogan are not updated!</span>";
                        }
                    }
                }
            }
                ?>
                
            <?php 
                $query = "select * from title_slogan where id='1'";
                $blog = $db->select($query);
                if($blog){
                    while($result = $blog->fetch_assoc()){
                ?>
            <div class="block sloginblock">  
                <div class="leftside">             
                <form action="titleslogan.php" method="post" enctype="multipart/form-data">
                <table class="form">					
                    <tr>
                        <td>
                            <label>Website Title</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $result['title']; ?>"  name="title" class="medium" />
                        </td>
                    </tr>
                        <tr>
                        <td>
                            <label>Website Slogan</label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $result['slogan']; ?>" name="slogan" class="medium" />
                        </td>
                    </tr>
                    <tr>
                            <td>
                                <label>Upload New Logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo"/>
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

                <div class="rightside">
                    <a>Current Logo:</a></br>
                    <img src="<?php echo $result['logo']; ?>" alt="Logo"/>
                </div>

            </div>
            <?php } } ?>
        </div>
    </div>
    
    <?php include 'inc/footer.php';?>
    