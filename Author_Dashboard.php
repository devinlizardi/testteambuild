<!DOCTYPE html>

<?php
   ob_start();
   session_start();
   if (empty($_SESSION['username'])){
	    header("Location: https://www.openscienceforums.com/login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
	    }

?>


<html lang="en">

<head>
  <title> Author Dashoard|Open Science Forum </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/CSS Files/defult_style.css">
</head>


<body>
    
    <!-- Create Page Header -->
    <div id = "page_header"> Open Science Forums </div>

	<!-- Create Main Nav_bar -->
    <nav id="clickable_header"> 
	    	    
	    <a href = "/index.php">   Home |      </a>
	    <?php if (empty($_SESSION['username'])){
	      ?>
	          <a href = "/Create_an_Account.php">  Create an Account |   </a> 		
                  <a href = "/login.php"> Login   </a> 
                 <?php }  
                     else{ ?>
                     	     <a href = "/Author_Dashboard.php">  Author Dashboard|     </a>
	                     <a href = "/Reviewer_Dashboard.php">  Reviewer Dashboard|   </a>
	                     <a href = "/Submit_a_Manuscript_Main.php"> Submit a Manuscript  </a>
	                     <a href = "/logout.php"> Logout   </a> 
               <?php  } ?>  
	    
    </nav>

  <!-- Create User Dashboard Box -->
	<div class = "sidenav"> 
		<header id = "dashboard_header"> Author Dashboard </header>		
		<section > <a href = "/Author_Dashboard.php"> Peer Reviewed Manuscripts </a></section> 	
		<section > <a href = "/author_dashboard_awaiting_review.php">  Manuscripts Awaiting Review </a></section> 
		<section > <a href = "/Submit_a_Manuscript_Main.php"> Submit a Manuscript  </a></section> 

	</div>	
	
	<!-- Display Paper Info as Page's Main Text -->
	<div id = "paper_info">
		<section >
				
			
			<?php
		        $con = mysqli_connect("localhost","root","@k311fMk","osf_db");
			$sql = mysqli_query($con, "SELECT * FROM `paper_info_tb` WHERE `author`= '". $_SESSION['username']."' AND `paperStatus` = 'Peer_Reviewed'");
			?>			
			<table border= "1" name="authors_papers" id= "authors_papers">
			<tr><th> paper id </th><th> paper status </th><th> title</th><th> submission date </th><th> reviews </th></tr>
			<?php  
			while ($paper_info = mysqli_fetch_array($sql)) { ?>
			 <tr><td> <?php echo $paper_info['paperID']."</td><td>".$paper_info['paperStatus']."</td><td>".$paper_info['paperTitle'] ."</td><td>".$paper_info['dateSubmitted']."</td><td>".$paper_info['numReviews'] ?></td></tr>
			<?php 
			 } 
			$con->close(); ?>
			</table>
			</section>
	</div>
	
</body>

</html>
