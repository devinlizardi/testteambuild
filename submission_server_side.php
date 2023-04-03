<?php
ob_start();
session_start();
$con = mysqli_connect("localhost","root","@k311fMk","osf_db");


$todaysDate     = date('Y/m/d');
$paperTitle     ="" ;

//get records from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {


if (isset($_POST['author_selection'])){
   $author_id = $_POST['author_selection'];
    } 
	
$paperTitle     = test_input($_POST["paperTitle"]);  
$Abstract       = test_input($_POST["Abstract"]);
$keywords       = test_input($_POST["paperKeywords"]);
$submissionID   = "OSF_".strval(date('Y'))."_".strval(rand(100000,999999));
$numAuthors     = count($author_id)    ;


    $i          = 0   ;
    while($i < $numAuthors ){
    	$author_info = explode("|", $author_id[$i]);
    	$author_email  = trim($author_info[2]);

    	if(empty($_SESSION['username'])){
    	     //echo "session name is empty";
    	     header("Location: https://www.openscienceforums.com/login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    	     $c_author       = NULL;     	     
    	}else{
    	     if(trim($_SESSION['username']) == $author_email ){
    	     $c_author       = 1; 
    	     }else{ 
    	     $c_author       = 0; 
    	     }
    	 }

    	//if(trim($_SESSION['username']) == $author_email ){
    	 //    $c_author       = 1; 
    	 //    }else{ 
    	 //    $c_author       = 0; 
    	 //    }    	

  	 
	//sql code for editing table
	$sql = "INSERT INTO `paper_info_tb` (paperTitle,Abstract,paperStatus, keywords,paperID, author, corresponding_author, dateSubmitted) 
			VALUES ('$paperTitle', '$Abstract','Peer_Reviewed','$keywords','$submissionID','$author_email', '$c_author', '$todaysDate')";
	$rs = mysqli_query($con, $sql);	
	}
	$i++;
	
     $i         = 1 ;	
     while($i <= 8 ){
	$reviewerName    = test_input($_POST["reviewer_" . $i ."_name"]);
	$reviewerEmail   = test_input($_POST["reviewer_" . $i ."_email"]);
	$reviewerWebpage = test_input($_POST["reviewer_" . $i ."_webpage"]);
	
        //sql code for editing table
	$sql = "INSERT INTO `reviewer_requests_tb` (paperTitle,Abstract,paperID, reviewer_name, reviewer_email, reviewer_webpage) 
					VALUES ('$paperTitle', '$Abstract','$submissionID','$reviewerName', '$reviewerEmail','$reviewerWebpage')";
	$rs = mysqli_query($con, $sql);	
	$i++;
	}
	
$con->close();
// save pdf file to server
$target_dir = "/var/www/html/openscienceforums/public/uploaded_papers/";
$target_file = $target_dir.$submissionID ;//.".pdf"; // basename($_FILES["pdfFile"]["name"]);
move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file.".pdf");
move_uploaded_file($_FILES["jatsUpload"]["tmp_name"], $target_file.".xml");
}
          

//validate form
function test_input($data) {
	

  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

header( "Location: https://www.openscienceforums.com/Author_Dashboard.php" );


?>