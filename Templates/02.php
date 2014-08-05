<?php
// We don't want to shit out errors that doesn't exist.
error_reporting(0);

// Required Config file
require_once "lib/config.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/main2.css" type="text/css" media="screen">
		<link href="css/slidershow.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jquery.maximage.css" type="text/css" media="screen" title="CSS" charset="utf-8" />
	<!-- Change the background on map image -->
	<?php
		// Now call the map images
		echo'
			<style>';
				// Call each slider
				foreach($MapBSPNum as $number) {
					// Set default file location
					$img_background_base = "img/{$MapBSP}/{$number[0]}.jpg";
					if (!file_exists($img_background_base)) {
						$MapBSP = "slider";
						$img_background_base = "img/{$MapBSP}/{$number[0]}.jpg";
					}
					echo ".slideshow li:nth-child(". $number[0] .") span { background-image: url(". $img_background_base .") }
					";
				}
			echo'
			</style>
		';
	?>
	<!-- END Change the background on map image END -->
	</head>
	<body>
	<ul class="slideshow">
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
		<li><span></span><div><h3></h3></div></li>
	</ul>
	<div class="DownLoader">
		<div id="ProgressBarText">
			<img class="loading_img" src="img/loader/bar.png" />
			<span id="DownloadPresent">100%</span>
			<span id="FileName">Loading...</span>
		</div>
	</div>
	<div class="ServerInfo">
		<?php
		echo '
			<div id="info">
				<center>
					<h3>
						Server Information
					</h3>
				</center>
				<ul>
					<li><img src="images/icons/information.png" width="16"> <span id="serverName">serverName</span></li>
					<li><img src="images/icons/map.png" width="16"> <span id="mapName">mapName</span></li>
					<li><img src="images/icons/group.png" width="16"> <span id="maxPlayers">maxPlayers</span> player slots</li>
				</ul>
			</div>
			<div id="steamid">
				';
				if ($row["avatarfull"] != null) {
					echo "
				<center>
					<h3>
						Your Steam Profile
					</h3>
				</center>
				<img src=" . $row["avatarfull"] . " width='100'>
				<ul>
					<li><img src='images/icons/user.png' width='16'> <span>" . $row["personaname"] . "</span></li>
					<li><img src='images/icons/key.png' width='16'> <span>STEAMID: <span class='steamid'>" . $steamid . "</span></span></li>
					<li><img style='position: relative; top: 3.4px;' src='images/flags/{$ShowFlag}.png' width='16'> <span>Connecting from <span class='country'>" . $flags[$ShowFlag] . "</span></span></li>
				</ul>";
				} else {
					echo '
				<center>
					<h3>
						Your Steam Profile
					</h3>
				</center>
				<ul>
					<li><img src="images/icons/error.png" width="16"> <span>CAN\'T CONNECT TO STEAM SERVERS...</span></li>
				</ul>';
				}
				echo '
			</div>
			<div id="custom">';
				if ($Config['InfoTab']['Title'] != null && $Config['InfoTab']['Description'] != null) {
				echo '
				<center>
					<h3>
						' . $Config['InfoTab']['Title'] . '
					</h3>
				</center>
				<ul>
					<li>
						' . $Config['InfoTab']['Description'] . '
					</li>
				</ul>';
				}
				echo '
			</div>
			';
		?>
	</div>
	</body>
</html>