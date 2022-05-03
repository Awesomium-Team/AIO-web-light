<!-- Copyright 2022 Awesomium team LLC. All Rights Reserved.-->

<?php
	require ('database.php');
    require ('steamauth/steamauth.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
    	<title>AIO - Ban system</title>
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
			*, ::after, ::before {
				box-sizing: content-box;
			}
			.table-bordered td, .table-bordered th {
				border: 1px solid #3a3f48;
			}
			
		</style>

		</br>
    	<div class="container" style="font-family: 'Fira Sans', sans-serif;">
			<center>
				<a style="color: black; cursor:pointer; text-decoration: none;" href='index.php'><h1>All in one - Ban system</h1></a>
				</br>
				<?php
					if(!isset($_SESSION['steamid'])) {
						echo '
						<a href="?login"><button class="btn btn-info" name="login"><i class="fa-brands fa-steam-square"></i> Login</button></a>
						<a href="https://github.com/Awesomium-Team/AIO-Bans-system/"><button class="btn btn-success" name="download" type="submit"><i class="fa-solid fa-cloud-arrow-down"></i> Download</button></a>
						</br>';
					}  else {
						include ('steamauth/userInfo.php');

						echo '<img style="border-radius: 50%" src="'.$steamprofile['avatar'].'" title="" alt="" /> ';
						echo " Welcome, <a style='color: GhostWhite;' href='user.php'>" . $steamprofile['personaname'].'</a>
						<form action="" method="get"> 
							</br> 
							<button class="btn btn-info" name="profile" type="submit"><i class="fa-solid fa-id-badge"></i> Profile</button> 
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
				<!--<button onclick="window.location.href='https://github.com/Awesomium-Team/AIO-Bans-system/'" class="btn btn-success" name="download" type="submit">Download</button>-->
			</center>
			</br>
        	<div class="row">
           		<div class="col-xl-12" >
                	<?php
                		if (isset($error)) {
                    		echo "<div class='alert alert-danger'>$error</div>";
                		} else {
                	?>
                    	<table style="background-color: #3a3f48; color: white;" class="table table-bordered">
                        	<thead>
                            	<tr>
                                	<th><i class="fa-solid fa-user"></i> Name</th>
                                	<th><i class="fa-brands fa-steam-symbol"></i> SteamID</th>
									<th><i class="fa-solid fa-file-signature"></i> Reason</th>
                            	</tr>
                        	</thead>

                        	<tbody>
                            	<?php foreach ($result as $row): ?>
                            	<tr>
                            		<td>
                            			<?php
											echo $row["Name"];
                            			?>
                            		</td>
									<td>
                            			<?php
											echo $row["SteamID"];
                            			?>
                            		</td>
                            		<td>
                            			<?php echo  $row["Reasons"]; ?>
                            		</td>
                            	</tr>
                            	<?php endforeach; ?>
                        	</tbody>
                    	</table>

                    	<?php 
                    		} 
                    	?>
            	</div>
        	</div>
    	</div>
	</body>
</html>
