<!DOCTYPE html>

<html lang="en">


<head>
  <title> Author Dashoard|Open Science Forum </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/CSS Files/defult_style.css">
</head>
<?php
   ob_start();
   session_start();
?>

<body>
    
    <!-- Create Page Header -->
    <div id = "page_header"> Open Science Forums </div>

	<!-- Create Main Nav_bar -->
    <nav id="clickable_header"> 
		
 	    <a href = "/index.php">   Home |      </a>
	    <a href = "/Submit_a_Manuscript_Main.php">  Submit a Manuscript |     </a>
	    
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
		<section > <a href="#"> Incomplete Submissions </a></section> 
		<section > <a href="#"> Manuscripts Awaiting Review </a></section> 
		<section > <a href="#"> Published Manuscripts </a></section> 	
	</div>	
	
	<!-- Display Paper Info as Page's Main Text -->
	<div id = "paper_info">
		<!-- <section ><p> Info about papers goes here. Info concerning each paper is seperated by a border. While this work helps us to understand how and when network closure leads firms to settle on suboptimal solutions due to early successes, the more general role that adaptive biases play in network effects remains undertheorized. For example, current theory leaves unaddressed the question of how network structure shapes a firm’s responses to poor initial experiences with highly valuable solutions. In contrast, the broader work on organizational learning suggest that such instances are common.  </p> </section > -->
		<section > <script src="C:/Users/Maria/Dropbox/Industry Work/Open Review/Site Developmet/Learning HTML/CSS Files/read_excel_file.js"></script></section> 
	</div>
	
</body>

</html>