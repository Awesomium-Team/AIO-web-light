<!-- Copyright 2022 Awesomium team LLC. All Rights Reserved.-->

<?php
	require ('database.php');
?>
{<?php
	foreach ($result as $row):
		echo '"'.$row["SteamID"].'":{"name":"'.$row["Name"].'", "steamid":"'.$row["SteamID"].'","reason":"'.$row["Reason"].'"},';
	endforeach;
?>"1":{"name":"TestAIOBan","steamid":"STEAM_0:1:123123","reason":"Start system"}}