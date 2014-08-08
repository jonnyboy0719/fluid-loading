<?php
$num = rand(0, sizeof($RandMusic)-1);

if($RandMusic[$num][0] != "")
{
	if($RandMusic[$num][3] == "YouTube") {
		$YouTube = explode("v=", $RandMusic[$num][0]);
		echo "
		<div style='width:0px;height:0px;' id=\"player\"></div>

		<script>
		  var tag = document.createElement('script');

		  tag.src = 'https://www.youtube.com/iframe_api';
		  var firstScriptTag = document.getElementsByTagName('script')[0];
		  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		  var player;
		  function onYouTubeIframeAPIReady() {
			player = new YT.Player('player', {
			  height: '390',
			  width: '640',
			  videoId: '".$YouTube[1]."',
			  events: {
				'onReady': onPlayerReady
			  }
			});
		  }

		  function onPlayerReady(event) {
			event.target.playVideo();
			event.target.setVolume(". $RandMusic[$num][4] .");
		  }
		</script>
		";
	}
	elseif($RandMusic[$num][3] == "YouTubeList") {
		$YouTube = explode("list=", $RandMusic[$num][0]);
		echo "
		<div style='width:0px;height:0px;' id=\"player\"></div>

		<script>
		  var tag = document.createElement('script');

		  tag.src = 'https://www.youtube.com/iframe_api';
		  var firstScriptTag = document.getElementsByTagName('script')[0];
		  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		  var player;
		  function onYouTubeIframeAPIReady() {
			player = new YT.Player('player', {
			  height: '390',
			  width: '640',
			  events: {
				'onReady': onPlayerReady,
				'onStateChange': onPlayerStateChange
			  }
			});
		  }

		  function onPlayerReady(event) {
			event.target.loadPlaylist({list: '".$YouTube[1]."'});
			event.target.setShuffle(shufflePlaylist, 'true');
			event.target.setVolume(". $RandMusic[$num][4] .");
			event.target.playVideo();
		  }
		  
		  function onPlayerStateChange(event) {
			if (event.data == YT.PlayerState.ENDED) {
			  event.target.nextVideo();
			  event.target.setVolume(". $RandMusic[$num][4] .");
			}
		  }
		</script>
		";
	}
	elseif($RandMusic[$num][3] == "MP3") {
		echo "<embed src='music/player.swf' id='radioplayer' name='radioplayer' quality='medium' allowScriptAccess='always' width='1' height='1' type='application/x-shockwave-flash' FlashVars='file=". $RandMusic[$num][0] ."&volume=". $RandMusic[$num][4] ."&start=0&duration=0&autostart=true&controlbar=none&dock=false&icons=false'>";
	}
	elseif($RandMusic[$num][3] == "SoundCloud") {
		echo '
			<iframe id="sc-widget" onload="MyFunction()" width="0" height="0" scrolling="no" frameborder="no" id="sc-widget" src="https://w.soundcloud.com/player/?url='.$RandMusic[$num][0].'&auto_play=true"></iframe>
			<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
			<script type="text/javascript">
			  (function(){
				var widgetIframe = document.getElementById(\'sc-widget\'),
					widget       = SC.Widget(widgetIframe);

				widget.bind(SC.Widget.Events.READY, function() {
				  widget.setVolume('.$RandMusic[$num][4].');
				});

			  }());
			</script>
			';
	}

	echo'
		<div class="sfx">
			<img src="img/music/bg.png" />';

			$GetArtist = preg_replace('/[^a-zA-Z0-9_]/s', '', $RandMusic[$num][2]);
			$GetSong = preg_replace('/[^a-zA-Z0-9_]/s', '', $RandMusic[$num][1]);

			$img_music_boxart = "img/music/boxart/{$GetArtist}/{$GetSong}.png";
				if (!file_exists($img_music_boxart)) {
					$img_music_boxart = "img/music/boxart/{$GetArtist}/default.png";
					if (!file_exists($img_music_boxart)) {
						$img_music_boxart = "img/music/boxart/unknown.jpg";
					}
				}

			// Debugger, to check your songs URL.
			// NOTE: It will escape &, (, ) plus other special characters and spaces.
			if ($Config['_Debug'] == true) {
				echo "<div id='debugger'>DEBUG SONG LOCATION: img/music/boxart/{$GetArtist}/{$GetSong}.png</div>";
			}

			echo '<img id="thumb" src="'.$img_music_boxart.'" />
			<p>';
				if (strlen($RandMusic[$num][1]) > 24) {
					echo substr($RandMusic[$num][1], 0, 24) .'...';
				} else {
					echo $RandMusic[$num][1];
				}
			echo '
			</p>
			<small>
				';
				if (strlen($RandMusic[$num][2]) > 26) {
					echo substr($RandMusic[$num][2], 0, 26) .'...';
				} else {
					echo $RandMusic[$num][2];
				}
			echo '
			</small>
		</div>
	';
}