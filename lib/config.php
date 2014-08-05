<?php
/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// MYSQL (For global settings for the loading screen, example achievements)

$Config['SQL_HOST'] = "";
$Config['SQL_DATABASE'] = "";
$Config['SQL_USER'] = "";
$Config['SQL_PASSWORD'] = "";

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// Debug Mode
// Note:
// If you want to debug if you suspect any errors or issues.
// --------------
// The file "other/_debug.php" must exist!
// --------------
// Usage:
// true - enabled
// false - disabled
// --------------
$Config['_Debug'] = false;

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// Steam API
// Note:
// Head over to http://steamcommunity.com/dev/apikey to gain a Steam API key.
// --------------
// Usage:
// NULL(empty) - disabled
// APIKEY - enabled
// --------------
$Config['apiKey'] = "";

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// InfoTab - Title
// --------------
$Config['InfoTab']['Title'] = "My Gmod Server";

// InfoTab - Sub Title
// Note:
// Only a few Templates have this feature.
// if you want this on your own template, just include "$Config['InfoTab']['SubTitle']"
// --------------
$Config['InfoTab']['SubTitle'] = "My Subtitle";

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// InfoTab - Description
// Note:
// This will set the information of your server, you can also insert raw HTML
// into the huge string.
// --------------
$Config['InfoTab']['Description'] = "
Downloading the content might take awhile if this is your first time playing on our server.
";

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// BG Override
// Note:
// This will only work if BGO_dir is not NULL (Empty) or have a available directory (with files).
// Else it will auto disable.
// --------------
// Usage:
// true - enabled
// false - disabled
// --------------
$Config['BGOverride'] = false;

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// BG Override directory
// Note:
// This will only work if $Config['BGOverride'] is set to true!
// --------------
// Usage:
// NULL(empty) - disabled
// my_folder_name - enabled
// --------------
$Config['BGO_dir'] = "";

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// Header image
// Note:
// Only use PNG file extentions, else it will not work.
// --------------
// Usage:
// NULL(empty) - disabled, will use default null.png image
// my_header - enabled
// --------------
$Config['HeaderIMG'] = "header";

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// Achievements
// Note:
// Only use this if you have Achievements by Handsome Matt
// URL: http://coderhire.com/scripts/view/1068
// --------------
// Usage:
// false - disabled
// true - enabled
// --------------
$Config['Achievements'] = false;

/*----------------------------------------------------------------------
----------------------------------------------------------------------*/

// Background Images
// Note:
// Don't edit this if you know what you are doing.
// --------------
$MapBSPNum = array(
	array("1"),
	array("2"),
	array("3"),
	array("4"),
	array("5"),
	array("6"),
	array("7"),
	array("8"),
	array("9"),
	array("10"),
	array("11"),
	array("12"),
);

/*----------------------------------------------------------------------
		REQUIRED FILES
----------------------------------------------------------------------*/
// Dummy
$thelist = "";

// Include Connections folder
if ($handle = opendir('lib/connections/')) {
    while (false !== ($file = readdir($handle)))
    {
        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
        {
            $thelist .= require_once "connections/{$file}";
        }
    }
    closedir($handle);
}

// Include the javascripts
if ($handle = opendir('lib/js/')) {
    while (false !== ($file = readdir($handle)))
    {
        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
        {
            $thelist .= require_once "js/{$file}";
        }
    }
    closedir($handle);
}


// Include other required files
if ($handle = opendir('lib/other/')) {
    while (false !== ($file = readdir($handle)))
    {
        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
        {
            $thelist .= require_once "other/{$file}";
        }
    }
    closedir($handle);
}

?>