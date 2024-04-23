<?php

	function genHeader(){
		$accountLink = 'login.php';
		$accountLinkText = 'Account';
		if (isset($_SESSION['username'])) {$accountLink = 'logout.php'; $accountLinkText = 'Log Out';}
		echo 
		"<div id='header'>
			<a href='landingpage.php'>BrookesConnect</a>
			<div id='info'>
				<a href='search.php'>Search</a>
				<a href='browseresearch.php'>Browse Research</a>
				<a href='browseprofiles.php'>Browse Profiles</a>
				<a href='profilepage.php'>My Profile</a>
			</div>
			<a href=$accountLink>$accountLinkText</a>
		</div>";
	}
	
?>