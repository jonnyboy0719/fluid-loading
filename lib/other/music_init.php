<?php
$num = rand(0, sizeof($RandMusic)-1);

if($RandMusic[$num][0] != "")
{
	if($RandMusic[$num][2] == "YouTube") {
		$YouTube = explode("v=", $RandMusic[$num][0]);
		echo '<iframe width="1" height="1" src="//www.youtube.com/embed/'.$YouTube[1].'?autoplay=1" frameborder="0" style="opacity: 0;"></iframe>';
		echo '<span style="position:absolute;top:5px;float:right;right:5px;font-size:22px;text-shadow: 0px 0px 4px rgba(255, 255, 255, 1);"><img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"> '. $RandMusic[$num][1] . ' <img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"></span>';
	}
	elseif($RandMusic[$num][2] == "YouTubeList") {
		$YouTube = explode("list=", $RandMusic[$num][0]);
		echo '<iframe width="1" height="1" src="//www.youtube.com/embed/videoseries?list='.$YouTube[1].'&autoplay=1" frameborder="0" style="opacity: 0;"></iframe>';
		echo '<span style="position:absolute;top:5px;float:right;right:5px;font-size:22px;text-shadow: 0px 0px 4px rgba(255, 255, 255, 1);"><img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"> '. $RandMusic[$num][1] . ' <img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"></span>';
	}
	elseif($RandMusic[$num][2] == "MP3") {
		echo "<embed src='music/player.swf' id='radioplayer' name='radioplayer' quality='medium' allowScriptAccess='always' width='1' height='1' type='application/x-shockwave-flash' FlashVars='file=". $RandMusic[$num][0] ."&volume=75&start=0&duration=0&autostart=true&controlbar=none&dock=false&icons=false'>";
		echo '<span style="position:absolute;top:5px;float:right;right:5px;font-size:22px;text-shadow: 0px 0px 4px rgba(255, 255, 255, 1);"><img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"> '. $RandMusic[$num][1] . ' <img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"></span>';
	}
	elseif($RandMusic[$num][2] == "SoundCloud") {
		echo '<iframe width="0" height="0" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$RandMusic[$num][0].'&amp;color=ff5500&amp;auto_play=true&amp;hide_related=false&amp;show_artwork=true"></iframe>';
		echo '<span style="position:absolute;top:5px;float:right;right:5px;font-size:22px;text-shadow: 0px 0px 4px rgba(255, 255, 255, 1);"><img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"> '. $RandMusic[$num][1] . ' <img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"></span>';
	}
}