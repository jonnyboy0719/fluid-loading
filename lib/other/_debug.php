<?php
/*---------------------------------
-----------------------------------
			DEBUG MODE
-----------------------------------
---------------------------------*/

if($RandMusic[$num][0] != "") {
	$RandMusic_Toggle = "Yes";
} else {
	$RandMusic_Toggle = "No";
}

if ($row["avatarfull"] == NULL && $Config['apiKey'] != NULL) {
	$APIKEY_Toggle = "Can't connect to Steam Servers...";
} elseif($Config['apiKey'] != NULL) {
	$APIKEY_Toggle = "Yes";
} else {
	$APIKEY_Toggle = "No";
}

if ($Config['_Debug'] == true) {
	echo "
		<div class='_debug'>
			<span style='color: green;'>Current Slider</span>: {$MapBSP}<br>
			<span style='color: green;'>Random Music Activated</span>: {$RandMusic_Toggle}<br>
		";
		if ($RandMusic_Toggle == "Yes") {
			echo "
				<span style='color: green;'>Current Music</span>: {$RandMusic[$num][1]}<br>
				";
		}
	echo "
			<span style='color: green;'>API Key Setup</span>: {$APIKEY_Toggle}<br>
			<span style='color: green;'>Connected SteamID</span>: {$steamid}<br>
			<span style='color: green;'>Current Heaeder</span>: {$img_header_base}
		</div>
	";
}
/*---------------------------------
---------------------------------*/