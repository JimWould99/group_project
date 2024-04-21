<?php
	require_once('../templates/headertemplate.php');
	require_once('../templates/footertemplate.php');
	require_once('../dbutils/mongodbutils.php');
	require_once('../utils/utils.php');
	//ensure we are in session
	session_start();
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

	<?php genHeader();?>
		<div id="main">
			<div id="intro_text">
				<?php
					echo "<p>".$research["Title"]."</p>";
					echo "<p>".$research["Body"]."</p>";
				?>
				<form action="../scripts/phpScripts/deleteresearch.php" method="post">
					<input hidden name="_id" value="<?= $_id?>" />
					<button>Delete Research</button>
				</form>
					<?php echo'<form action="editresearchpage.php?_id='.$_id.'" method="post">';?>
					<button>Edit Research page</button>
				</form>

			</div>
			<div class="research_trio">
				<div class="research">
					<img src="research_image1.jpg" alt="Research Image 1" />
				</div>
			</div>
		</div>

		<?php genFooter();?>
	</body>
</html>
