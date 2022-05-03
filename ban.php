<!-- Copyright 2022 Awesomium team LLC. All Rights Reserved.-->

<?php
	require ('database.php');
    require ('steamauth/steamauth.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
    	<title>AIO - Add ban</title>
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
		
		<style>
			.form-control {
				width: 90%;
				color: white;
				border: 0px solid;
				border-radius: 0px;
				background-color: rgba(0,0,0,0.3);
			}
			:focus.form-control {
				background-color: rgba(0,0,0,0.3);
				color: white;
			}
		</style>
		
		</br>
    	<div class="container" style="font-family: 'Fira Sans', sans-serif;">
			<center>
				<a style="color: black; cursor:pointer; text-decoration: none;" href='index.php'> <h1>All in one - Add ban</h1></a>
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
							<button class="btn btn-primary" name="profile" type="submit"><i class="fa-solid fa-id-badge"></i> Profile</button> 
							<button class="btn btn-success" name="download" type="submit"><i class="fa-solid fa-cloud-arrow-down"></i> Download</button> 
							<button class="btn btn-danger" name="logout" type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
						</form>';
					}    
				?>  
			</center>
			</br>
        	<div  class="row">
           		<div class="col-xl-12">
					<div style="background-color: #3a3f48; color: white;">
						</br>
						<?php
							$SqlChecker = $pdo->query("SELECT `SteamID`, `Group` FROM `aio_users`"); 
						
							if(!isset($_SESSION['steamid'])) {
							}  else {
								include ('steamauth/userInfo.php');
								echo '<center>';
								// Shittly code / Говнокод для парса группы
								foreach ($SqlChecker as $row):
									if($row["SteamID"] == $_SESSION['steamid']){
										if($row["Group"] == 'admin'){
											echo '<form>
											  <div class="form-group">
												<label for="SteamIDs"><i class="fa-brands fa-steam"></i> SteamID</label>
												<input type="form-control" class="form-control" id="SteamIDs" name="SteamIDs" placeholder="Enter SteamID">
											  </div>
											  <div class="form-group">
												<label for="Names"><i class="fa-solid fa-signature"></i> Name</label>
												<input type="form-control" class="form-control" id="Names" name="Names" placeholder="Enter name">
											  </div>
											  <div class="form-group">
												<label for="Reasons"><i class="fa-solid fa-gavel"></i> Reason</label>
												<input type="form-control" class="form-control" id="Reasons" name="Reasons" placeholder="Enter reason">
											  </div>
											  <button type="submit" class="btn btn-success", name="addban"><i class="fa-solid fa-check"></i> Submit</button>
											</form>';
										} else {
											header('Location: index.php');
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
