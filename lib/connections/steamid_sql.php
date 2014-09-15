<?php
if ($id != null) {
	// Create connection
	$con=mysqli_connect($Config['SQL_HOST'],$Config['SQL_USER'],$Config['SQL_PASSWORD'],$Config['SQL_DATABASE']);

	// Check connection
	if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	// Achievements
	$row_achievements = mysqli_query($con,"SELECT * FROM achv_achievements WHERE steamID64=" . mysqli_real_escape_string($con,$id) .";");
	$frow2 = mysqli_fetch_array($row_achievements);
}
?>
