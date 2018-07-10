<?php 

	require 'config/config.php';
	require 'includes/form_handlers/register_handler.php';
	require 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title> Register here</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php
		if(isset($_POST['register_button'])){
			echo '
				<script>
					$(document).ready(function() {
						$("#first").hide();
						$("#second").show();
					});
				</script>

			';
		}
	?>

	<div class="container">
		<div class="login_box">
			<div class="login_header">
				<h3> Recipe Network</h3><hr width="50%">
				<h5>Login or Sign up below</h5>
			</div>

			<div id="first">
				
					<form  action="register.php" method="POST">
						<input type="email" name="log_email" placeholder="Email address">
						<br>

						<input type="password" name="log_password" placeholder="Password ">
						<br>

						<input type ="submit" name = "login_button" value="Sign In" >
						<br>
						<a href="#" id="signup" class="signup"> If you haven't signed up, register here</a>
					</form>
					
			</div>

		


				
			<div id="second">
				<form action="register.php" method="POST">
				

						
					<input type="text" name="reg_fname" placeholder="First Name" value="<?php
					 if(isset($_SESSION['reg_fname']))
					 {
					 	echo $_SESSION['reg_fname']; 
					 }	
					 ?>" required>
					<br>
					<input type="text" name="reg_lname" placeholder="Last Name" value="<?php
					 if(isset($_SESSION['reg_lname']))
					 {
					 	echo $_SESSION['reg_lname']; 
					 }	
					 ?>" required>
					<br>
					<input type="text" name="reg_email" placeholder="Email" value="<?php
					 if(isset($_SESSION['reg_email']))
					 {
					 	echo $_SESSION['reg_email']; 
					 }	
					 ?>"
					  required>
					<br>
					<input type="text" name="reg_email2" placeholder="Confirm Email" value="<?php
					 if(isset($_SESSION['reg_email2']))
					 {
					 	echo $_SESSION['reg_email2']; 
					 }	
					 ?>" required>
					<br>
					<input type="password" name="reg_password" placeholder="Password" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>

					<input type="submit" name="register_button" value="Register">
					<br>
					<a href="#" id="signin" class="signin"> Already have an account?, Sign in here </a>


				</form>

			</div>
			
		</div>
		<div>
			<?php
			
					$arrlength = count($error_array);

					for($x = 0; $x < $arrlength; $x++)
					 {
							echo "<p>" . $error_array[$x] . '</p>';
							
					}
			?>
		
		</div>
		

	</div>

</body>
</html>