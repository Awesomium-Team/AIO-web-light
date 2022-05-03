<!-- Copyright 2022 Awesomium team LLC. All Rights Reserved. And thanks for steam auth SmItH197-->

<?php
	$steamauth['apikey'] = "63C463B05D803ABC32769AB1BBFCC68F"; // Steam API key
	$steamauth['domainname'] = "localhost/bansys"; // For login page/URL редирект после логирования
	$steamauth['logoutpage'] = "";
	$steamauth['loginpage'] = "";

	// ERRORS
	if (empty($steamauth['apikey'])) {die("<div style='display: block; width: 100%; background-color: red; text-align: center;'>SteamAuth:<br>Please supply an API-Key!<br>Find this in steamauth/SteamConfig.php, Find the '<b>\$steamauth['apikey']</b>' Array. </div>");}
	if (empty($steamauth['domainname'])) {$steamauth['domainname'] = $_SERVER['SERVER_NAME'];}
	if (empty($steamauth['logoutpage'])) {$steamauth['logoutpage'] = $_SERVER['PHP_SELF'];}
	if (empty($steamauth['loginpage'])) {$steamauth['loginpage'] = $_SERVER['PHP_SELF'];}
?>
