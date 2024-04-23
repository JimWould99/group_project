<?php

	function genHeader(){
		//$accountLink = 'login.php';

		//if (isset($_SESSION['username'])) {$accountLink = 'logout.php'}
		echo 
		'<div id="header">
			<a href="landingpage.php">BrookesConnect</a>
			<div id="info">
				<a href="search.php">Search</a>
				<a href="browseresearch.php">Browse Research</a>
				<a href="browseprofiles.php">Browse Profiles</a>
			</div>
			<a href="login.php">Account</a>
		</div>';
	}
	
?>