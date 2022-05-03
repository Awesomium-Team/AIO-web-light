<!-- Copyright 2022 Awesomium team LLC. All Rights Reserved. And thanks for steam auth SmItH197-->

<?php
ob_start();
session_start();

if (isset($_GET['login'])){
	require 'openid.php';
	require './database.php';
	try {
		require 'SteamConfig.php';
		$openid = new LightOpenID($steamauth['domainname']);
		
		if(!$openid->mode) {
			$openid->identity = 'https://steamcommunity.com/openid';
			header('Location: ' . $openid->authUrl());
		} elseif ($openid->mode == 'cancel') {
			echo 'User has canceled authentication!';
		} else {
			if($openid->validate()) { 
				$id = $openid->identity;
				$ptn = "/^https?:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
				preg_match($ptn, $id, $matches);
				
				$_SESSION['steamid'] = $matches[1];
				
                $_SESSION['auth'] = true; 
				$json_object = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$steamauth['apikey']."&steamids=".$matches[1]);
				
				if($json_object == false){
                    die($Functions->getIndex("steam_fail"));
                }else{
                    $json_decoded = json_decode($json_object);
                    $player = $json_decoded->response->players[0];
                    $_SESSION['name'] = $player->personaname;
                    $_SESSION['steamid'] = $player->steamid;
                    $_SESSION['avatarfull'] = $player->avatarfull;
                    if(!empty($player)){
                        $getPlayer = $pdo->query("SELECT * FROM `aio_users` WHERE SteamID = ".$matches[1]);		
                        //if($getPlayer == $matches[1]){
						if ($getPlayer->rowCount() > 0) {
							$pdo->query("UPDATE `aio_users` SET SteamName = '".$player->personaname."' WHERE SteamID = '".$player->steamid."'");
                            $_SESSION['name'] = $player->personaname;
                            $_SESSION['steamid'] = $player->steamid;
                        }else{
							$pdo->query("INSERT INTO `aio_users`(`SteamName`, `SteamID`, `Group`, `Sumbit1`, `Sumbit2`) VALUES ('".$player->personaname."', '".$player->steamid."', 'user', '[]', '[]')");
                        };
                    }else{
                       // die($Functions->getIndex("steam_fail"));
                    }
                }
				
				
				if (!headers_sent()) {
					header('Location: '.$steamauth['loginpage']);
					exit;
				} else {
					?>
					<script type="text/javascript">
						window.location.href="<?=$steamauth['loginpage']?>";
					</script>
					<noscript>
						<meta http-equiv="refresh" content="0;url=<?=$steamauth['loginpage']?>" />
					</noscript>
					<?php
					exit;
				}
			} else {
				echo "User is not logged in.\n";
			}
		}
	} catch(ErrorException $e) {
		echo $e->getMessage();
	}
}

if (isset($_GET['logout'])){
	require 'SteamConfig.php';
	session_unset();
	session_destroy();
	header('Location: '.$steamauth['logoutpage']);
	exit;
}

if (isset($_GET['back'])){
	header('Location: index.php');
	exit;
}

if (isset($_GET['profile'])){
	header('Location: user.php');
	exit;
}

if (isset($_GET['addban'])){
	header('Location: ban.php');
	exit;
}

if (isset($_GET['download'])){
	header("Location: https://github.com/Awesomium-Team/AIO-Bans-system/");
	exit;
}

if (isset($_GET['addban'])){
	require 'openid.php';
	require './database.php';
	$pdo->query("INSERT INTO `aio_bans`(`Name`, `SteamID`, `Reasons`) VALUES ('".$_GET['Names']."', '".$_GET['SteamIDs']."', '".$_GET['Reasons']."')");
	
	header('Location: '.$_SERVER['PHP_SELF']);
	exit;
}


if (isset($_GET['update'])){
	unset($_SESSION['steam_uptodate']);
	require 'userInfo.php';
	header('Location: '.$_SERVER['PHP_SELF']);
	exit;
}


?>
