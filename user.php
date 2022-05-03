<!-- Copyright 2022 Awesomium team LLC. All Rights Reserved.-->

<?php
	require ('database.php');
    require ('steamauth/steamauth.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
    	<title>AIO - User</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Fira+Sans" rel="stylesheet">
	</head>

	<body class="background-color">
		<script src="https://mrkubu.github.io/file/js/lib/d3.js"></script>
		<script src="https://mrkubu.github.io/file/js/lib/trianglify.js"></script>
		<script src="https://mrkubu.github.io/file/js/lib/mkscript.js"></script>
		<script src="https://kit.fontawesome.com/e834407684.js" crossorigin="anonymous"></script>
		
		</br>
    	<div class="container" style="font-family: 'Fira Sans', sans-serif;">
			<center>
				<a style="color: black; cursor:pointer; text-decoration: none;" href='index.php'> <h1>All in one - User</h1></a>
				</br>
				<?php
					if(!isset($_SESSION['steamid'])) {
						header('Location: index.php');
						exit;
					}  else {
						include ('steamauth/userInfo.php');
						
						echo '<img style="border-radius: 50%" src="'.$steamprofile['avatar'].'" title="" alt="" /> ';
						echo " Welcome, <a style='color: GhostWhite;' href='user.php'> " . $steamprofile['personaname'].'</a>
						<form action="" method="get">
							</br>
							<button class="btn btn-info" name="back" type="submit"><i class="fa-solid fa-angle-left"></i> Back</button>
							<button class="btn btn-success" name="download" type="submit"><i class="fa-solid fa-cloud-arrow-down"></i> Download</button> 
							<button class="btn btn-danger" name="logout" type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
						';
							
						$SqlChecker = $pdo->query("SELECT `SteamID`, `Group` FROM `aio_users`"); 
						foreach ($SqlChecker as $row):
							if($row["SteamID"] == $_SESSION['steamid']){
								if($row["Group"] == 'admin'){
									echo '<button class="btn btn-primary" name="addban" type="submit"><i class="fa-solid fa-circle-plus"></i> Add ban</button>';
								};
							};
						endforeach;
						
						echo '</form>';
					}    
				?>  
			</center>
			</br>
        	<div  class="row">
           		<div class="col-xl-12">
					<div style="background-color: #3a3f48; color: white;">
						</br>
						<?php
							if(!isset($_SESSION['steamid'])) {
							}  else {
								include ('steamauth/userInfo.php');
								echo '<center>';
								echo '<img style="border-radius: 50%" src="'.$steamprofile['avatarfull'].'" title="" alt="" /> ';
								echo '</br></br><h2><i class="fa-solid fa-user"></i> ';
								echo $steamprofile['personaname'];
								echo '</h2>';
								echo '<a style="color: GhostWhite;" href='.$steamprofile['profileurl'].'><button class="btn btn-primary" style="background-color:rgba(0,0,0,0.3); border-color: white;"><i class="fa-brands fa-steam"></i> Profile steam</button></a>';
								echo '</br></br>';
								echo '<i class="fa-brands fa-steam-square"></i> SteamID: '.$steamprofile['steamid'];
								echo '</br>';
								echo '<i class="fa-solid fa-signature"></i> Name: '.$steamprofile['realname'];
								echo '</br>';
								//echo 'Created on: '.$steamprofile['timecreated'];

								// Shittly code / Говнокод для парса группы
								foreach ($SqlChecker as $row):
									if($row["SteamID"] == $_SESSION['steamid']){
										if($row["Group"] == 'admin'){
											echo '<i class="fa-solid fa-user-group"></i> Group: <a style="color:red;";>Admin</a>';
										} else {
											echo '<i class="fa-solid fa-user-group"></i> Group: User';
										}
									};
								endforeach;
								
								echo '</center>';
								echo '</br>';
							}    
						?>  
					</div>
            	</div>
        	</div>
    	</div>
	</body>
</html>
