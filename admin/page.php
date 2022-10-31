<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<style>
    .actiondel{
        margin-left: 20px;
    }
    .actiondel a{
        background: #f0f0f0 none repeat scroll 0 0;
        border: 1px solid #ddd;
        color: #444;
        cursor: pointer;
        font-size: 18px;
        font-weight: normal;
        padding: 3px 20px;
    }
</style>

<?php
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
    }
    else{
        $id = $_GET['pageid'];
    }
?>

        <div class="grid_10">
		<?php
    if(!Session::get('userRole')=='0' && !Session::get('userRole')=='2'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>
            <div class="box round first grid">
            <?php 
                    $query = "select * from page where id='$id'";
                    $addpage = $db->select($query);
                    if($addpage){
                        while($result = $addpage->fetch_assoc()){
                ?> 
                <h2><?php echo $result['name'] ?></h2>
                <?php } } ?>

                <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $name = mysqli_real_escape_string($db->link, $_POST['name']);
                $body = mysqli_real_escape_string($db->link, $_POST['body']);

                if($name=="" || $body==""){
                    echo("<span style='color: red; font-size: 18px;'>Field must not be empty.</span>");
                }
                else{
                    $query = "UPDATE page SET name='$name', body='$body' WHERE id='$id'";
                    $updated_row = $db->update($query);
                    if($updated_row){
                        echo("<span style='color: green; font-size: 18px;'>Page updated successfully.</span>"); 
                    }
                    else{
                        echo("<span style='color: red; font-size: 18px;'>Page is not updated.</span>");
                    }
                }
            }
                ?>

                <div class="block">
                <?php 
                    $query = "select * from page where id='$id'";
                    $addpage = $db->select($query);
                    if($addpage){
                        while($result = $addpage->fetch_assoc()){
                ?>               
                 <form action="" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name'] ?>" class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $result['body'] ?>
                                </textarea>
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="actiondel"><a href="delpage.php?delpage=<?php echo $result['id'] ?>" onclick="return confirm('Are you sure to Delete the Page?');">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php  } } ?>
                </div>
            </div>
        </div>
        
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

<?php include 'inc/footer.php';?>
    