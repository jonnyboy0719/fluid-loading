<?php
// We don't want to show errors if the "?mapname=" and/or ?sid= is invalid/not set (only for web testing)
error_reporting(0);

// Required Config file
require_once "lib/config.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/main.css" type="text/css" media="screen">
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
	<img class="header" src="<?php
	// If file don't exist.
	if (!file_exists($img_header_base)) {
		// Lets search for it again
		$img_header_base = "images/{$hIMG}.png";
		
		// If not found, load the default null.
		if (!file_exists($img_header_base)) {
			$hIMG = "null";
			$img_header_base = "images/{$hIMG}.png";
		}
	}
	echo $img_header_base;
	?>">
	<div class="ServerInfo">
		<center>
			<h3>
				<?php echo $Config['InfoTab']['Title'];?>
			</h3>
		</center>
		<ul>
			<li>
				<?php echo $Config['InfoTab']['Description'];?>
			</li>
			<div style="height:15px;width:100%"></div>
		</ul>
		<div class="DownLoader">
			<div id="ProgressBarText">
				<img class="loading_img" src="img/loader/bar.png" />
				<span id="DownloadPresent">100%</span>
				<span id="FileName">Loading...</span></div>
		</div>
	</div>
	<div class="MapInfo">
		<?php
		echo '
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
			<div style="height:25px;width:100%"></div>
			<center>
				<h3>
					Your Steam Profile
				</h3>
			</center>
			<img src=" '. $row["avatarfull"] .'" width="100">
			<ul>
				<li><img src="images/icons/user.png" width="16"> <span>'.htmlspecialchars($row["personaname"]).'</span></li>
				<li><img src="images/icons/key.png" width="16"> <span>STEAMID: <span class="steamid">'.$steamid.'</span></span></li>
			</ul>
			<div style="height:65px;width:100%"></div>';
		?>
	</div>
	</body>
</html>
