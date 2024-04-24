<?php
	// this function generates the header based on whether the user is logged in, and if so which account thype they have
	function genHeader($_id = "", $accountType=""){
		if (isset($_SESSION['username'])) {
			if ($accountType == "asm"){ // if you are an Academic staff member
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

			} else if ($accountType == "tto"){ // if you are a tech transfer officer
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

			} else {// if you are an Industrial representative
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