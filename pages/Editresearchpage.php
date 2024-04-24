<?php
	require_once('../templates/headertemplate.php');
	require_once('../templates/footertemplate.php');
	require_once('../dbutils/mongodbutils.php');
	require_once('../utils/utils.php');
	//ensure we are in session
	session_start();
	if (isset($_SESSION["username"])){
		$accounttype = getUserData($_SESSION["username"])["AccountType"];
		if($accounttype == "asm"){
		  $profileId = getProfileId($_SESSION["username"]);
		} else{
		  $profileId = "";
		}
	  } else {
		$profileId = "";
		$accounttype = "";
	  }

	use MongoDB\BSON\ObjectId;
	$newPage = TRUE;

	$_id = getId();
	if ($_id != FALSE){
		$newPage = FALSE;
		if (researchPageExists($_id) == TRUE){ #checks that the research page exists
			$research = getResearchPage($_id);
		} else {
			redirectHome();
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
			<div id="reject-message">
			<?php
				if ($newPage == FALSE ){// change to false
					if($research["Verified"] == false){
						if ($research["RejectMessage"] != ""){
							echo 'Rejected. Reason:'.$research["RejectMessage"];
						} else{
							echo 'Not yet Approved/Rejected';
						}
					} else{
						echo 'Approved!';
					}
				}
			 ?>
			</div>
			<?php
				if ($newPage == FALSE){
					echo '<form id="researchPage" action="../scripts/phpScripts/submitresearch.php?_id='.$_GET["_id"].'" method="POST">';
				} else {
					echo '<form id="researchPage" action="../scripts/phpScripts/submitresearch.php" method="POST">';
				}
			 ?>
				<div id="main">
					<div id="intro_text">
						<?php // This is the text title
							if ($newPage == FALSE){
								echo '<input name="Title" id="title" placeholder="Default Research Title" id="title" value="'.$research["Title"].'" type="text">';
							} else {
								echo '<input name="Title" id="title" placeholder="Default Research Title" id="title" value="" type="text">';
							}
						?>
						<div id="editor-container">
							<div id="editor" class="pell"></div>
							<?php // this is the text body
								if ($newPage == FALSE){
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
			
							<img id="image1" src="research_image1.jpg" alt="Research Image 1" /> <!-- DO THIS LATER, NO WAY TO UPLOAD IMAGES YET -->
							<input type="text" id="image1-url" placeholder="THIS IS CURRENTLY A PLAEHOLDER THERE IS NOTHING HERE" />
							<?php // this is the blurb
								if ($newPage == FALSE){
									echo '<textarea name="Blurb" rows="3" cols="40" placeholder="Please enter a blurb for your research, no more than 150 words as anything past that will not be displayed">'.$research["Blurb"].'</textarea>';
								} else {
									echo '<textarea name="Blurb" rows="3" cols="40" placeholder="Please enter a blurb for your research, no more than 150 words as anything past that will not be displayed"></textarea>';
								}
							?>
						</div>
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