<?php
$con = mysqli_connect("localhost","root","@k311fMk","osf_db");

//get records from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
$f_name     = test_input($_POST["F_name"]);  
$l_name     = test_input($_POST["L_name"]);
$initials   = test_input($_POST["Initials"]);
$orcid      = test_input($_POST["ORCID"]);
$instit     = test_input($_POST["institution"]);
$email      = test_input($_POST["email"]);
$passwrd    = password_hash(test_input($_POST["psw"]), PASSWORD_DEFAULT);
$hash       = md5( rand(0,1000) );  //used to verify accounts via email 
   
   
//sql code for editing table
$sql = "INSERT INTO participant_info_tb (first_name, last_name,middle_initials, orcid, institution, email_address, hashed_password, hash) 
                                   VALUES ('$f_name', '$l_name','$initials','$orcid','$instit','$email','$passwrd', '$hash')";
$rs = mysqli_query($con, $sql);


// Send email to the new user
$to      =  "ayendakemp@yahoo.com";//$email; 
$subject = "Open Science Forums | Verification"; 
$message = "Thank you for signing up ";

                       
$headers = 'From:ayenda@openscienceforums.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

$con->close();
$message2 = "Thanks for signing up for Open Science Forums!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
------------------------
Username:  '".$email."'  
Password: '".test_input($_POST["psw"])."'
------------------------
  
Please click this link to activate your account:
http://openscienceforums.com/verify_account.php?email='".$email."'&hash='".$hash."'
  
"; // Our message above including the link


echo "Thank you for registering for OSF."; # Check your email to verify your account.";
}



//validate form
function test_input($data) {
	

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>