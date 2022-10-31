<?php
	include '../lib/Session.php';
	Session::checkLogin();
?>

<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>

<?php include '../helpers/format.php';?>

<?php
	$db = new Database(); 
	$fm = new format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
<section id="content">
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$email = $fm->validation($_POST['email']);
			$email = mysqli_real_escape_string($db->link, $email); 

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<span style='color: red; font-size: 18px;'>Invalid Email Address!</span>";
            }
            else{
                $mailquery = "SELECT * FROM user WHERE email='$email' limit 1";
                $mailcheck = $db->select($mailquery);
                if($mailcheck != false){
                    while($value = $mailcheck->fetch_assocs()){
                        $userid = $value['id'];
                        $username = $value['username'];
                    }
                    $text = substr($email, 0, 4);
                    $rand = rand(1000, 9999);
                    $newpass = "$text$rand";
                    $password = md5($newpass);
                    $updatequery = "UPDATE user SET password='$password'WHERE id='$userid'";
                    $updated_row = $db->update($updatequery);
                    
                    $to = "$email";
                    $from = "jfemon4@gmail.com";
                    $headers = "From: $from\n";
                    $headers .= 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $subject = "Your new Password";
                    $message = "Hello, ".$username.". Your username is ".$username." and new password is ".$newpass.". Please visit our website and use these username and new password to login. Thank you!";
                    $sendmail = mail($to, $subject, $message, $headers);
                    if($sendmail){
                        echo("<span style='color: green; font-size: 18px;'>Username and Password has been send to your mail.</span>");
                    }
                    else{
                        echo("<span style='color: red; font-size: 18px;'>Something went wrong!</span>");
                    }
                }
                else{
                    echo("<span style='color: red; font-size: 18px;'>Email not found!</span>");
                }
		}
    }
	?>
	<form action="" method="post">
		<h1>Password Recovery</h1>
		<div>
			<input type="text" placeholder="Enter your Email" required="" name="email"/>
		</div>
		
		<div>
			<input style="width:92%;" type="submit" value="Recover Password" />
		</div>
	</form><!-- form -->
	<div class="button">
		<a style="margin-right: 5%;" href="login.php">Log In</a>
	</div>
	<div class="button">
		<a href="../index.php">Md Jannatul Ferdhous Emon</a>
	</div><!-- button -->
</section><!-- content -->
</div><!-- container -->
</body>
</html>
