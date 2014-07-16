<?php
// Get SteamID
$id = $_GET['sid'];

// Get ApiKey and SteameID
$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $Config['apiKey'] . "&steamids=" . $id;

// Needed to read the XML/Table for Steam API
$json = file_get_contents($url);
$suser = json_decode($json, true);

// Set it as readable table form
$row = $suser["response"]["players"][0];

// Convert UniqeID to SteamID
$uid1 = bcsub( $id, '76561197960265728' ) & 1;
$uid2 = (bcsub( $id, '76561197960265728' ) - $uid1 ) / 2;
$steamid = "STEAM_0:{$uid1}:{$uid2}";

// Check if API key is not NULL
if ($Config['apiKey'] == NULL) {
	echo "
			<span style='font-family: Lucida Sans;color: red;text-shadow: 0px 0px 5px red;'>WARNING: </span><span style='font-family: Lucida Sans;color: black;text-shadow: 0px 0px 5px white;'>\$Config['apiKey'] is not set!<br>
			Please head into \"lib/config.php\" and setup \$Config['apiKey'].</span>
		";
}

// Check if API key is valid
if ($row["avatarfull"] == NULL && $Config['apiKey'] != NULL && $_GET['sid'] != NULL) {
	echo "
			<span style='font-family: Lucida Sans; color: red;text-shadow: 0px 0px 5px red;'>WARNING: </span><span style='font-family: Lucida Sans;color: black;text-shadow: 0px 0px 5px white;'>\$Config['apiKey'] is not loading properly, please
			check if its configured properly, and/or that you are connected to the Internet.</span>
		";
}
?>