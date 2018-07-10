

<?php 
// Declaring variable to prevent errors

	$fname =  ""; // first name
	$lname = ""; // last name
	$em =  ""; // email
	$em2 = ""; // email2
	$password = ""; // password
	$password2 = ""; // password2
	$date = ""; // sign up date
	$error_array = array(); // holds error messages

	if ( isset($_POST['register_button']))
	{
		// Registration form values

		//First Name
		$fname =  strip_tags($_POST['reg_fname']); // remove html tags
		$fname =  str_replace(' ', '', $fname); // strip empty space
		$fname = ucfirst(strtolower($fname)); // upper case first letter
		$_SESSION['reg_fname'] = $fname;// stores the first name into the session

		//Last Name 
		$lname =  strip_tags($_POST['reg_lname']); // remove html tags
		$lname =  str_replace(' ', '', $lname); // strip empty space
		$lname = ucfirst(strtolower($lname)); // upper case first letter
		$_SESSION['reg_lname'] = $lname;// stores the first name into the session


		// Email
		$em =  strip_tags($_POST['reg_email']); // remove html tags
		$em =  str_replace(' ', '', $em); // strip empty space
		$em = ucfirst(strtolower($em)); // upper case first letter
		$_SESSION['reg_email'] = $em;// stores the first name into the session

			// Email
		$em2 =  strip_tags($_POST['reg_email2']); // remove html tags
		$em2 =  str_replace(' ', '', $em2); // strip empty space
		$em2 = ucfirst(strtolower($em2)); // upper case first letter
		$_SESSION['reg_email2'] = $em2;// stores the first name into the session

		// password
		$password =  strip_tags($_POST['reg_password']); // remove html tags

		//password 2
		$password2 =  strip_tags($_POST['reg_password2']); // remove html tags
		
		 
		$date  = date("Y-m-d");  // current date

		if ($em ==  $em2) 
		{
			// check if email is in valid format

			if(filter_var($em, FILTER_VALIDATE_EMAIL))
			{
				$em  = filter_var($em, FILTER_VALIDATE_EMAIL);
				// check if email already exists

				$e_check = mysqli_query($con, "SELECT  email FROM  users WHERE email='$em'");
				// count num of rows returned
				$num_rows = mysqli_num_rows($e_check);

				if ($num_rows > 0)
				{
					array_push( $error_array, "Email already in use<br>");
				}
			}
			else
			{
				array_push( $error_array, "Invalid  Email format<br>");
			}


		}
		else
		{
			array_push( $error_array, "Emails do not match") ;
		}

		if  ( strlen($fname) > 25 ||  strlen($fname) < 2 )
		{
			array_push( $error_array, "Your First Name must be 2 and 25 characters");
		}
		if  ( strlen($lname) > 25 || strlen($lname) < 2 )
		{
			echo "Your Last Name must be 2 and 25 characters";
		}

		if ($password != $password2) 
		{
			array_push( $error_array, "  passwords do not match");
		}

		else
		{
			if(preg_match('/[^A-Za-z0-9]/', $password))   // regular expression
			{
				array_push( $error_array, "You password can only include english characters or numbers");
			}

		}

		if ( strlen($password) > 30 || strlen($password) < 5 ) 

		{
				array_push( $error_array, "Your password must be in between 5 and 30 characters ");
		}


		if (empty($error_array))
		{
			$password  = md5($password)  ; // Encrypt password 
			// generate username for user by concat first and last name 
			$username = strtolower($fname . "_" . $lname);
			// check if username 
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
			$i = 0;
			// if username exists add num to username
			while(mysqli_num_rows($check_username_query) != 0)
			{
				$i++;
				$username = $username . "_" . $i; 
				$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
			}

			//profile pic
			$rand =  rand(1,2);
			if ($rand == 1)
		
					$profile_pic = "assets/images/profile_pics/defaults/1.png";
			else
					$profile_pic = "assets/images/profile_pics/defaults/e.png";

			//inserting data into db
			$query =  mysqli_query($con, "INSERT INTO users VALUES ('','$fname', '$lname', '$em', '$password','$date', '$profile_pic','0', '0', 'no', ',', '$username')");
			array_push($error_array, "<span style='color:#14C800;'> Successfully registered </span><br>");

		}


	}

?>