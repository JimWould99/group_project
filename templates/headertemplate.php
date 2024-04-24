<?php

	function genHeader($_id = "", $accountType=""){

		if (isset($_SESSION['username'])) {
			if ($accountType == "asm"){
				echo 
				"<div id='header'>
					<a href='landingpage.php'>BrookesConnect</a>
					<div id='info'>
						<a href='search.php'>Search</a>
						<a href='overview.php'>Research Overview</a>
						<a href='browseprofiles.php'>Browse Profiles</a>
						<a href='profilepage.php?_id=".$_id."'>My Profile</a>
					</div>
					<a href=logout.php>Log Out</a>
				</div>";

			} else if ($accountType == "tto"){
				echo 
				"<div id='header'>
					<a href='landingpage.php'>BrookesConnect</a>
					<div id='info'>
						<a href='approve.php'>Approve Research</a>
						<a href='search.php'>Search</a>
						<a href='browseresearch.php'>Browse Research</a>
						<a href='browseprofiles.php'>Browse Profiles</a>
					</div>
					<a href=logout.php>Log Out</a>
				</div>";

			} else {// if you are an IR
				echo 
				"<div id='header'>
					<a href='landingpage.php'>BrookesConnect</a>
					<div id='info'>
						<a href='search.php'>Search</a>
						<a href='browseresearch.php'>Browse Research</a>
						<a href='browseprofiles.php'>Browse Profiles</a>
					</div>
					<a href=logout.php>Log Out</a>
				</div>";

			}
		} else{// if not logged in
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