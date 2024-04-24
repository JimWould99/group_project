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

	$_id = getId();
	if ($_id == FALSE){
		redirectHome();
	}
	
	if (researchPageExists($_id) == TRUE){ #checks that the research page exists
		$research = getResearchPage($_id);
	} else{
		redirectHome();
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Brookes Connect</title>
		<link rel="stylesheet" href="../styles/researchpage.css" />
	</head>
	<body>

	<?php genHeader($profileId,$accounttype);?>
		<div id="main">
			<div id="intro_text">
				<?php
					echo "<p>".$research["Title"]."</p>";
					echo "<p>".$research["Body"]."</p>";
				?>
			</div>
		</div>

		<?php genFooter();?>
	</body>
</html>
