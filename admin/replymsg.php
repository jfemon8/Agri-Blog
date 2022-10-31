<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<style>
    .actionview{
        margin-left: 20px;
    }
    .actionview a{
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
    if(!Session::get('userRole')=='0' && !Session::get('userRole')=='1'){
        echo "<script>window.location = 'index.php';</script>";
    }
?>

<?php
if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
    echo "<script>window.location = 'inbox.php';</script>";
}
else{
$id = $_GET['msgid'];
}
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>

                <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $to = $fm->validation($_POST['toemail']);
                $from = $fm->validation($_POST['fromemail']);
                $subject = $fm->validation($_POST['subject']);
                $message = $fm->validation($_POST['message']);

                $sendmail = mail($to, $subject, $message, $from);

                if($sendmail){
                    echo("<span style='color: green; font-size: 20px;'>Replay send successfully.</span>"); 
                }
                else{
                    echo("<span style='color: red; font-size: 20px;'>Oops, Replay is not send! Try again.</span>");
                }
            }
                ?>

                <div class="block">               
                 <form action="" method="post">

                 <?php $query = "select * from contact where id='$id'"; 
				$msg = $db->select($query); 
				if($msg){
					while($result = $msg->fetch_assoc()){
				?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name="toemail" value="<?php echo $result['email'] ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" placeholder="Please enter your Email Address" class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Please enter Subject" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message"></textarea>
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                            </td>
                        </tr>
                    </table>
                    <?php } } ?>
                    </form>
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
    