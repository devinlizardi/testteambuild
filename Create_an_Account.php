<!DOCTYPE html>

<html lang="en">

<head>
  <title> Submit | Open Science Forum </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/CSS Files/registration_and_login.css">
</head>


<body>
    
    <!-- Create Page Header -->
    <div id = "page_header"> Open Science Forums </div>

	<!-- Create Main Nav_bar -->
    <nav id="clickable_header"> 
	    
	    <a href = "/index.php">   Home |      </a>

	    
    </nav>
	
	<!-- Registration Form -->
	<form action="/register_new_account_server_side.php" method = "post" style="border:1px solid #ccc">
		<div class="container">
			<h1>Sign Up</h1>
			<p>Please fill in this form to create an account.</p>
		<hr>
		
		<label for="F_name"><b>First Name</b></label>
		<input type="text"  name="F_name" required>
		
		<label for="L_name"><b>Last Name</b></label>
		<input type="text"  name="L_name" required>
		
		<label for="Initials"><b> Middle Initial(s)</b></label>
		<input type="text"  name="Initials" >
		
		<label for="Institution"><b>Institution</b></label>
		<input type="text"  name="institution" required>
		
		<label for="ORCID"><b> ORCID </b></label>
		<input type="text"  name="ORCID" >
		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email" required>
		
		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw"  id = "psw"  oninput= "check(this)" required>

		<label for="psw-repeat"><b>Repeat Password</b></label>
		<input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" oninput= "check(this)" required>
		
		<script language='javascript' type='text/javascript'>
		function check(input) {
			if (input.value != document.getElementById('psw').value) {
				input.setCustomValidity('Password does not match.');
				//input.value = "";
			} else {
				// input is valid -- reset the error message
				input.setCustomValidity('');
			}
		}
		</script>
		

		<label>
		<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
		</label>

		<!--<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

		<div class="clearfix">
			<!-- <button type="button" class="cancelbtn">Cancel</button>  -->
			<button type="submit" class="signupbtn">Sign Up</button>
		</div>
	
  </div>
</form>
	
	
</body>

</html>+