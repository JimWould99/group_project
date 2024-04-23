<?php

	function genHeader($_id = ""){

		if (isset($_SESSION['username'])) {
			echo 
			"<div id='header'>
				<a href='landingpage.php'>BrookesConnect</a>
				<div id='info'>
					<a href='search.php'>Search</a>
					<a href='browseresearch.php'>Browse Research</a>
					<a href='browseprofiles.php'>Browse Profiles</a>
					<a href='profilepage.php?_id=".$_id."'>My Profile</a>
				</div>
				<a href=logout.php>Log Out</a>
			</div>";
		} else{
			echo 
			"<div id='header'>
				<a href='landingpage.php'>BrookesConnect</a>
				<div id='info'>
					<a href='search.php'>Search</a>
					<a href='browseresearch.php'>Browse Research</a>
					<a href='browseprofiles.php'>Browse Profiles</a>
				</div>
				<a href=login.php>Account</a>
			</div>";
		}

	}
	
?>