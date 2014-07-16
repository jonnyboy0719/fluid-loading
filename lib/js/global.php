	<!-- Setup Gmod JS & Progress Bar Code -->
	<script type="text/javascript" charset="utf-8">	
		//-------------------------------------
		// Gmod JS code
		//-------------------------------------
		function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) 
		{
			document.getElementById("serverName").innerHTML = servername;
			document.getElementById("mapName").innerHTML = mapname;
			document.getElementById("maxPlayers").innerHTML = maxplayers;
		}
		
		//-------------------------------------
		// Progress Bar Code
		//-------------------------------------
		var totalFiles = 0;
		var files = 0;
		
		function SetFilesTotal( total ) {
			totalFiles = total;
		}
		
		function SetStatusChanged( status ) {
			document.getElementById("FileName").innerHTML = status;
			if (status.search("Getting Addon") > -1) {
				files++;
				document.getElementById("DownloadPresent").innerHTML = Math.round((files / totalFiles) * 100) + "%";
			}
			if (status.search("Workshop") > -1)
			{
				document.getElementById("DownloadPresent").innerHTML = "100%";
			}
			if (status == "Sending client info...")
			{
				document.getElementById("DownloadPresent").innerHTML = "100%";
			}
		}
		
		function DownloadingFile( fileName ) {
			files++;
			document.getElementById("DownloadPresent").innerHTML = Math.round((files / totalFiles) * 100) + "%";
		}
		
		function SetFilesNeeded( needed ) {
			document.getElementById("DownloadPresent").innerHTML = present + "%";
		}
	</script>