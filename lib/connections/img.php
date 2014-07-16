<?php
// =======================
// ==== Images Fixing ====
// =======================

// Header Config Setting
$hIMG = $Config['HeaderIMG'];

// Background Reader
$MapBSP = $_GET['map'];

// Override Background with own.
$MapBSP_Override = $Config['BGOverride'];

if ($MapBSP_Override == true && $Config['BGO_dir'] != null or file_exists($Config['BGO_dir'])) {
	$MapBSP = $Config['BGO_dir'];
}

// Set default file location
$img_header_base = "images/{$hIMG}.png";

// ===========================
// ==== END Images Fixing ====
// ===========================
?>