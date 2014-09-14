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
		<link rel="stylesheet" href="css/main3.css" type="text/css" media="screen">
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
	<!-- Deus Ex BG Image -->
	<div class="bg"></div>
	<img class="loading_img" src="img/loader/deusex.gif" />
	<div id="ProgressBarText">
		<span id="FileName">Loading...</span>
	</div>
	<?php
		echo'
		<div id="steamid">
			';
			if ($row["avatarfull"] != null) {
				echo "
			<img src=" . $row["avatarfull"] . " width='100'>
			<ul>
				<li><img src='images/icons/user.png' width='16'> <span>" . htmlspecialchars($row["personaname"]) . "</span></li>
				<li><img src='images/icons/key.png' width='16'> <span>STEAMID: <span class='steamid'>" . htmlspecialchars($steamid) . "</span></span></li>
				<li><img src='images/flags/{$ShowFlag}.png' width='16'> <span>Connecting from <span class='country'>" . $flags[$ShowFlag] . "</span></span></li>
			</ul>";
			} else {
				echo '
			<img src="images/steam/default.png" width="100">
			<ul>
				<li><img src="images/icons/error.png" width="16"> <span>CAN\'T CONNECT TO STEAM SERVERS...</span></li>
			</ul>';
			}
			echo '
		</div>';
	?>
	<div class="ServerInfo">
		<?php
		echo '
			<div id="custom">';
				if ($Config['InfoTab']['Title'] != null && $Config['InfoTab']['Description'] != null) {
				echo '
					<h3>
						<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
							<defs>
								<linearGradient id="grad1" x1="0%" y1="0%" x2="0%" y2="100%">
									<stop offset="0%" style="stop-color:#f5e47c;stop-opacity:1" />
									<stop offset="100%" style="stop-coloR:#927333;stop-opacity:1" />
								</linearGradient>
							</defs>
							<text fill="url(#grad1)" x="30" y="100">
								' . $Config['InfoTab']['Title'] . '
							</text>
						</svg>
					</h3>
					<h4>
						' . $Config['InfoTab']['SubTitle'] . '
					</h4>
				<p>
					' . $Config['InfoTab']['Description'] . '
				</p>';
				}
				echo '
			</div>
			';
		?>
	</div>
	</body>
</html>
