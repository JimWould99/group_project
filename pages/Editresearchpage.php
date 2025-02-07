<?php
	require_once('../templates/headertemplate.php'); // requires the header template to be loaded
	require_once('../templates/footertemplate.php'); // requires the footer template to be loaded
	require_once('../dbutils/mongodbutils.php'); // requires that all functions that directly interact with the mongodb to be loaded
	require_once('../utils/utils.php'); // requires the non db interacting functions to be loaded in
	session_start(); //ensure we are in session
	
	if (isset($_SESSION["username"])){ // checks if the user is logged in
		$accounttype = getUserData($_SESSION["username"])["AccountType"]; // fetches the user's account type
		if($accounttype == "asm"){ // if logged in with an asm account
			$profileId = getProfileId($_SESSION["username"]); //fetches and sets the profile id associated with the logged in asm account
		} else{ // if not an asm sets profile id to blank string so that functions don't break but also do nothing
			$profileId = "";
		}
	} else { // if not logged in sets the profile id and account type to nothing to allow functions to work
		$profileId = "";
		$accounttype = "";
	}

	$newPage = TRUE; // defaults to assuming page is new and not an existing page

	$_id = getId(); // tries to get the id from the page via GET
	if ($_id != FALSE){ // if there is a page id
		$newPage = FALSE; // runs the page in editing rather than new page mode
		if (researchPageExists($_id) == TRUE){ //if the researchpage exist in the db based on the id
			$research = getResearchPage($_id); //accesses the relevant research page
		} else {
			redirectHome(); // if trying to access a page that doesn't exist errors would occur so sends back to landing page
		}
	}
	//if reached via post:
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($research)) {
		  //upload new file
		  if(isset($_FILES['uploadFile'])) {
			storeResearchFile($_FILES['uploadFile'], $profilePage);
		  }
		  //reload research page from db into session
		  $research = getResearchPage(($research['_id']));
		}
	  
	}

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Brookes Connect</title>
		<link rel="stylesheet" href="../styles/editresearchpage.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="https://unpkg.com/pell/dist/pell.min.css"
		/>
	</head>
	<body>
	<?php genHeader($profileId,$accounttype);?>
		<div id="wrap_edit_r">
			<?php if($newPage == FALSE){
				echo '<div id="reject-message">';
			} ?>
			<?php
				if ($newPage == FALSE ){// this section sets the message to the ASM that tells them the current status of their research
					if($research["Verified"] == false){
						if ($research["RejectMessage"] != ""){
							echo 'Rejected. Reason:'.$research["RejectMessage"]; // tells them their research page is rejected along with a reason why
						} else{
							echo 'Not yet Approved/Rejected'; // not yet seen message
						}
					} else{
						echo 'Approved!'; // approved if approved by tto
					}
				}
			 ?>
			 <?php if($newPage == FALSE){
				echo '</div>';
			} ?>
			
			<?php
				if ($newPage == FALSE){ // crude method of loading in different html based on if a new page is being made or existing being edited
					echo '<form id="researchPage" action="../scripts/phpScripts/submitresearch.php?_id='.$_GET["_id"].'" method="POST" enctype="multipart/form-data">';
				} else {
					echo '<form id="researchPage" action="../scripts/phpScripts/submitresearch.php" method="POST" enctype="multipart/form-data">';
				}
			 ?>
				<div id="main">
					<div id="intro_text">
						<?php // This is the text title
							if ($newPage == FALSE){// crude method of loading in different html based on if a new page is being made or existing being edited
								echo '<input name="Title" id="title" placeholder="Default Research Title" id="title" value="'.$research["Title"].'" type="text">';
							} else {
								echo '<input name="Title" id="title" placeholder="Default Research Title" id="title" value="" type="text">';
							}
						?>
						<div id="editor-container">
							<div id="editor" class="pell"></div>
							<?php // this is the text body
								if ($newPage == FALSE){// crude method of loading in different html based on if a new page is being made or existing being edited
									echo '<textarea hidden name="Body" id="markup">'.$research["Body"].'</textarea>';
								} else {
									echo '<textarea hidden name="Body" id="markup"></textarea>';
								}
							?>
						</div>
			
					</div>
					<div class="research_trio">
						<div class="research">
							<div>This is the blurb section!</div>
								Select thumbnail image to upload:
								<input type="file" name="Thumbnail" id="Thumbnail">
							<?php 							
							if(isset($research['Images']["thumbnail1"])){echo '<img id="image1" src='.$research['Images']["thumbnail".$_id].' alt="Research Image" />';}?>
							<?php // this is the blurb
								if ($newPage == FALSE){// crude method of loading in different html based on if a new page is being made or existing being edited
									echo '<textarea name="Blurb" rows="3" cols="40" placeholder="Please enter a blurb for your research, no more than 150 words as anything past that will not be displayed">'.$research["Blurb"].'</textarea>';
								} else {
									echo '<textarea name="Blurb" rows="3" cols="40" placeholder="Please enter a blurb for your research, no more than 150 words as anything past that will not be displayed"></textarea>';
								}
							?>
						</div>
						<div id="file-upload>">
								Select file image to upload:
								<input type="file" name="uploadFile" id="uploadFile">
        				</div> 
						<?php
						if(isset($research)) {//if research has already beened saved then show any uploaded files for download
							$rows = $research['Files'];
							$rows = iterator_to_array($rows);//convert bson object to PHP array
							echo 
							"<table>"; // start a table tag in the HTML
							foreach( $rows as $filename => $filelocation) {   //Creates a loop to loop through results
							echo
								"<tr>
									<td>
										<a href=$filelocation download>" . htmlspecialchars($filename) . "</a>  
										<div id='button_box'>
											<a href='../scripts/phpScripts/deleteresearchfile.php?_id={$_id}&file={$filename}'>
												<button type='button' id='deleteResearchFile'>Delete</button>
											</a>
										</div>" . /*deleteResearchFile($file, $researchpage)*/ 
									"</td>
								</tr>";  //$row['index'] the index here is a field name
						}
						echo 
							"</table>";
						}
						?>			
					</div>
				</div>
			</form>
			<button class="submit-button" form="researchPage" type="submit">Submit Research</button>
		</div>
		
		<?php genFooter();?>

		<script src="https://unpkg.com/pell"></script>
		<script src="../scripts/pell.js"></script>
	</body>
</html>