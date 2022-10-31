<?php include 'inc/header.php';?>

<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$fname = $fm->validation($_POST['firstname']);
			$lname = $fm->validation($_POST['lastname']);
			$email = $fm->validation($_POST['email']);
			$body = $fm->validation($_POST['body']);

			$fname = mysqli_real_escape_string($db->link, $fname); 
			$lname = mysqli_real_escape_string($db->link, $lname); 
			$email = mysqli_real_escape_string($db->link, $email); 
			$body = mysqli_real_escape_string($db->link, $body);

			$error = "";
			if(empty($fname)){
				$error = "First name must not be empty.";
			}
			elseif(empty($lname)){
				$error = "Last name must not be empty.";
			}
			elseif(empty($email)){
				$error = "Email must not be empty.";
			} 
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$error = "Invalid Email Address!";
			}
			elseif(empty($body)){
				$error = "Message field must not be empty.";
			}
			else{
				$query = "INSERT INTO contact(firstname, lastname, email, body) VALUES('$fname', '$lname', '$email', '$body')";
				$inserted_rows = $db->insert($query);
				if ($inserted_rows) {
					$msg = "Message send successfully.";
				}
				else {
					$error = "Unfortunately, message is not send.";
                }
			}
		}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
					if(isset($error)){
						echo "<span style='color:red; font-weight:bold;'>$error</span>";
					}
					if(isset($msg)){
						echo "<span style='color:green; font-weight:bold;'>$msg</span>";
					}
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter your first name"/>
					</td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter your last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter your email address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
	</div>
</div>
<?php include "inc/sidebar.php";?>
<?php include "inc/footer.php";?>