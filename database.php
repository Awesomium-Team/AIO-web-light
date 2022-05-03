<!-- Copyright 2022 Awesomium team LLC. All Rights Reserved.-->

<?php
	// Datbase/База данных
    $DB_HOSTNAME = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "aio";
	// For debug create db/Дебаг, для создания базы (автоматически)
	//CREATE TABLE IF NOT EXISTS aio_bans (Name VARCHAR(500), SteamID VARCHAR(20), Reason VARCHAR(500));
	//CREATE TABLE IF NOT EXISTS aio_users (SteamName VARCHAR(500), SteamID VARCHAR(20), SteamID64 VARCHAR(20), Sumbit1 VARCHAR(500), Sumbit2 VARCHAR(500));

	$pdo = new PDO("mysql:host=$DB_HOSTNAME;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$result = array();
	try {
   		$result = $pdo->query("SELECT Name, SteamID, Reasons FROM aio_bans");
    	$result = $result->fetchAll();
	} catch (Exception $e) {
    	$error = $e->getMessage();
	}
?>