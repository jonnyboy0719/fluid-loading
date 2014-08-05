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
		echo "<embed src='music/player.swf' id='radioplayer' name='radioplayer' quality='medium' allowScriptAccess='always' width='1' height='1' type='application/x-shockwave-flash' FlashVars='file=". $RandMusic[$num][0] ."&volume=". $RandMusic[$num][3] ."&start=0&duration=0&autostart=true&controlbar=none&dock=false&icons=false'>";
		echo '<span style="position:absolute;top:5px;float:right;right:5px;font-size:22px;text-shadow: 0px 0px 4px rgba(255, 255, 255, 1);"><img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"> '. $RandMusic[$num][1] . ' <img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"></span>';
	}
	elseif($RandMusic[$num][2] == "SoundCloud") {
		echo '
			<iframe width="0" height="0" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$RandMusic[$num][0].'&amp;color=ff5500&amp;auto_play=true&amp;hide_related=false&amp;show_artwork=true"></iframe>
			<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>';
		echo "
			<script type=\"text/javascript\">
			  (function(){
				var widgetIframe = document.getElementById('sc-widget'),
					widget       = SC.Widget(widgetIframe);

				widget.bind(SC.Widget.Events.READY, function() {
				  widget.bind(SC.Widget.Events.PLAY, function() {
					// get information about currently playing sound
					widget.getCurrentSound(function(currentSound) {
					  console.log('sound ' + currentSound.get('') + 'began to play');
					});
				  });
				  // get current level of volume
				  widget.getVolume(function(volume) {
					console.log('current volume value is ' + volume);
				  });
				  // set new volume level
				  widget.setVolume(". $RandMusic[$num][3] .");
				  // get the value of the current position
				});

			  }());
			</script>
			";
		echo'
			<span style="position:absolute;top:5px;float:right;right:5px;font-size:22px;text-shadow: 0px 0px 4px rgba(255, 255, 255, 1);"><img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"> '. $RandMusic[$num][1] . ' <img src="images/icons/music.png" style="box-shadow: 0px 0px 15px rgba(50, 50, 50, 0);" width="16"></span>
		';
	}
}