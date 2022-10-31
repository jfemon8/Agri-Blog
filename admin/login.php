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
			$username = $fm->validation($_POST['username']);
			$password = $fm->validation(md5($_POST['password']));

			$username = mysqli_real_escape_string($db->link, $username); 
			$password = mysqli_real_escape_string($db->link, $password); 

			$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
			$result = $db->select($query); 
			
			if($result != false){
				$value = $result->fetch_assoc();
				Session::set("login", true); 
				Session::set("username", $value['username']); 
				Session::set("userId", $value['id']);
				Session::set("userRole", $value['role']);
				header("Location:index.php"); 
			}
			else{
				echo("<span style='color: red; font-size: 20px;'>Wrong Username or Password!</span>");
			}
		}
	?>
	<form action="login.php" method="post">
		<h1>Admin Login</h1>
		<div>
			<input type="text" placeholder="Username" required="" name="username"/>
		</div>
		<div>
			<input type="password" placeholder="Password" required="" name="password"/>
		</div>
		<a href="forgetpass.php"><h5 style="text-align: right; margin-right: 5%;"> Forgot Password?</h5></a>
		<div>
			<input style="width:92%;" type="submit" value="Log In" />
		</div>
	</form><!-- form -->
	<div class="button">
		<a style="margin-right: 5%;" href="../signup.php">Sign Up</a>
	</div>
	<div class="button">
		<a href="../index.php">Md Jannatul Ferdhous Emon</a>
	</div><!-- button -->
</section><!-- content -->
</div><!-- container -->
</body>
</html>
 