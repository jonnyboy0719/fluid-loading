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
	$row_achievements = mysqli_query($con,"SELECT * FROM achv_achievements WHERE steamID64=" . mysqli_real_escape_string( $con, $id ) .";");
	$frow2 = mysqli_fetch_array($row_achievements);
	
	if ($Config['Achievements'] == true) {
		echo '
			<div class="acvh">
				<div class="acvh-base">';
		if ($frow2['completed'] >= -1)
		{
			while($frow = mysqli_fetch_array($row_achievements))
			{
				if($frow['completed'] == 1)
				{

					$ACHVIMG = $frow['achievement'];

					$img_achv = "images/achv/{$ACHVIMG}.png";
					if (!file_exists($img_achv)) {
						$img_achv = "images/achv/null.png";
					}

					echo '
						<li><div class="bga"><img id="thumb" src="' . $img_achv . '" /></div></li>
					';
				}
			}
		}
		else
		{
			echo '<span>You have no completed achievements.</span>';
		}
		echo '
				</div>
			</div>
		';
	}
}
