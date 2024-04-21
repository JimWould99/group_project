<?php
	require_once('../dbutils/mongodbutils.php');
	require_once('../utils/utils.php');
	session_start();
	use MongoDB\BSON\ObjectId;

	if(isset($_GET["_id"])){ # If the page has been accessed with an ID then it is a valid page and you can continue
		try {
			$_id = new ObjectId($_GET["_id"]); #Bug currently exists where if there is an id from GET but it's invalid page crashes, i have "fixed it by using this try/catch solution
		} catch(Exception $e){
			redirectHome();
		}

		if (researchPageExists($_id) == TRUE){ #checks that the 
			$research = getResearchPage($_id);
		} else{
			redirectHome();
		}

	} else {
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

	<?php include '../scripts/phpScripts/header.php';?>
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

		<?php include '../scripts/phpScripts/footer.php';?>
	</body>
</html>
