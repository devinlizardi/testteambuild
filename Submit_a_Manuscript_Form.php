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
  <title> Submit | Open Science Forum </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/CSS Files/defult_style.css">
  <link rel="stylesheet" href="/CSS Files/select.css">
  <script src="/select.js" type="module"></script>
</head>


<body>
    
    <!-- Create Page Header -->
    <div id = "page_header"> Open Science Forums </div>

	<!-- Create Main Nav_bar -->
    <nav id="clickable_header"> 

	    <a href = "/index.php">  Home |      </a>
	    <a href = "/Author_Dashboard.php">  Author |     </a>
	    <a href = "/Reviewer_Dashboard.php">  Reviewer |   </a>
	    <a href = "/Submit_a_Manuscript_Main.php"> Submit a Manuscript   </a>	    
    </nav>

  <!-- Create User Dashboard Box -->
	<div class = "sidenav"> 
		<header id = "dashboard_header"> Submission </header>		
		<section > <a href="#"> Step 1: Title & Abstract </a></section> 
		<section > <a href="#"> Step 2: File Upload </a></section> 
		<section > <a href="#"> Step 3: Attributes </a></section> 	
		<section > <a href="#"> Step 4: Authors & Institutions </a></section> 	
		<section > <a href="#"> Step 5: Suggest Reviewers </a></section> 	
        <section > <a href="#"> Step 6: Review and Submit </a></section> 	
	</div>	
	
	<!-- Display Paper Info as Page's Main Text -->
	<div id = "paper_info">
		<header id = "submissionPageHeader" style = "font-size: 25px"> Step 1: Title & Abstract  </header>
                          							
		<form name="new_submission_form" method = "post" action = "/submission_server_side.php" enctype="multipart/form-data">
			<section id = "submissionSub" style = "margin-top:50px">
			<label for="paperTitle">Manuscript Title: </label>
			<textarea rows="1" cols="30" name="paperTitle" id="paperTitle" required></textarea>
			</section>
			
			<section id = "submissionSub">
			<label for="Abstract">Abstract:</label>
			<textarea rows="3" cols="100" name="Abstract" id="Abstract" ></textarea>
			</section>
			
			<header id = "submissionPageHeader" style = "font-size: 25px" > Step 2: File Uploads  </header>	
			
			<section id = "submissionSub_bordered" style = "margin-top:50px">
			Upload a proofread copy of your finalized mauscript in JATS XML format. 
			<input type="file" name="jatsUpload" id="jatsUpload" >
			</section>
			
			<section id = "submissionSub_bordered">
			Upload a typeset and proofread copy of your finalized mauscript in PDF format. 
			<input type="file" name="pdfFile" id="pdfFile" >
			</section>
			
			
			<header id = "submissionPageHeader" style = "font-size: 25px" > Step 3: Attributes  </header>	
			
			<section id = "submissionSub" style = "margin-top:50px">
			<label for="paperKeywords">Provide a list of keywords that accurately describe your paper (five minimum). 
			Seperate keywords with a semicolon: </label>
			<section style = "margin-top:10px">
			<textarea rows="1" cols="60" name="paperKeywords" id="paperKeywords" ></textarea>
			</section>
			</section>
			
			
			<header id = "submissionPageHeader" style = "font-size: 25px" > Step 4: Authors </header>	
			<section id = "submissionSub" style = "margin-top:50px">
				
			Use the menu below to identify all the authors of this paper (include yourself). 
			You can search by the author's, name, email address, or primary institution of employment.  
			All authors must be registered members of openscienceforms.com <br><br> 	
			
			<select name= "author_selection[]" multiple data-select id="author_selection">
			<?php
		        $con = mysqli_connect("localhost","root","@k311fMk","osf_db");
			$sql = mysqli_query($con, "SELECT `first_name`,`last_name`,`institution`, `email_address` FROM `participant_info_tb`");
			$authorID = []
			?>			
			<datalist name="authors_list" id= "authors_list">
			<?php  
			while ($coauthors = mysqli_fetch_array($sql)) { ?>
			<option><?php echo $coauthors['last_name'].", ".$coauthors['first_name']." |  ".$coauthors['institution'] ." |  ".$coauthors['email_address'] ;?></option>
			<?php 
			 } 
			$con->close(); ?>
			</datalist>
			</select>	
			</section>
			
		        <header id = "submissionPageHeader" style = "font-size: 25px" > Step 5: Suggest Reviewers </header><br>
		        <section id = "submissionSub" style = "margin-bottom:25px">
		        Suggest exactly eight scholars who are appropriate for reviewing your paper. 
			Suggested reviewers need not be members of this website. 
			</section>	
			<section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_1_name">Reviewer 1 name:</label>	
				<input  name = "reviewer_1_name" ><br>
				<label for="reviewer_1_email">Reviewer 1 email:</label>	
				<input  name = "reviewer_1_email" ><br>
				<label for="reviewer_1_email_webpage">Reviewer 1 webpage:</label>	
				<input  name = "reviewer_1_webpage" ><br>
			</section>
			<section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_2_name">Reviewer 2 name:</label>	
				<input  name = "reviewer_2_name" ><br>
				<label for="reviewer_2_email">Reviewer 2 email:</label>	
				<input  name = "reviewer_2_email" ><br>
				<label for="reviewer_2_email_webpage">Reviewer 2 webpage:</label>	
				<input  name = "reviewer_2_webpage" ><br>
			</section>
			<section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_3_name">Reviewer 3 name:</label>	
				<input  name = "reviewer_3_name" ><br>
				<label for="reviewer_3_email">Reviewer 3 email:</label>	
				<input  name = "reviewer_3_email" ><br>
				<label for="reviewer_3_email_webpage">Reviewer 3 webpage:</label>	
				<input  name = "reviewer_3_webpage" ><br>
			</section>
		       <section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_4_name">Reviewer 4 name:</label>	
				<input  name = "reviewer_4_name" ><br>
				<label for="reviewer_4_email">Reviewer 4 email:</label>	
				<input  name = "reviewer_4_email" ><br>
				<label for="reviewer_4_email_webpage">Reviewer 4 webpage:</label>	
				<input  name = "reviewer_4_webpage" ><br>
			</section>
			<section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_5_name">Reviewer 5 name:</label>	
				<input  name = "reviewer_5_name" ><br>
				<label for="reviewer_5_email">Reviewer 5 email:</label>	
				<input  name = "reviewer_5_email" ><br>
				<label for="reviewer_5_email_webpage">Reviewer 5 webpage:</label>	
				<input  name = "reviewer_5_webpage" ><br>
			</section>
			<section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_6_name">Reviewer 6 name:</label>	
				<input  name = "reviewer_6_name" ><br>
				<label for="reviewer_6_email">Reviewer 6 email:</label>	
				<input  name = "reviewer_6_email" ><br>
				<label for="reviewer_6_email_webpage">Reviewer 6 webpage:</label>	
				<input  name = "reviewer_6_webpage" ><br>
			</section>
			<section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_7_name">Reviewer 7 name:</label>	
				<input  name = "reviewer_7_name" ><br>
				<label for="reviewer_7_email">Reviewer 7 email:</label>	
				<input  name = "reviewer_7_email" ><br>
				<label for="reviewer_7_email_webpage">Reviewer 7 webpage:</label>	
				<input  name = "reviewer_7_webpage" ><br>
			</section>
			<section id = "submissionSub_bordered" style = "margin-bottom:25px">
				<label for="reviewer_8_name">Reviewer 8 name:</label>	
				<input  name = "reviewer_8_name" ><br>
				<label for="reviewer_8_email">Reviewer 8 email:</label>	
				<input  name = "reviewer_8_email" ><br>
				<label for="reviewer_8_email_webpage">Reviewer 8 webpage:</label>	
				<input  name = "reviewer_8_webpage" ><br>
			</section>

			

			<header id = "submissionPageHeader" style = "font-size: 25px" > Step 6: Submitt Manuscript </header>	
			<section id = "submissionSub" style = "margin-top:50px">
			Review the information above then click the button below to submit your paper. Submissions are final! <br>
			<input type="submit" name = "Save_button" >
			</section>
			
		</form>
	</div>
	
</body>

</html>