<html>
	<head>
		<title>TagChatter</title>
		<!-- Bootstrap CSS CDN -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<!-- Bootstrap JS, Popper.js and jQuery CDN -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<!-- Lato Font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="style.css" rel="stylesheet">
		
		<script type="text/javascript">
			var channelActualID;
			function openChat(id, name) {
				channelActualID = id;
				document.getElementById("channel-name").innerHTML = "#" + name;
				var channels = document.getElementsByClassName("channels");
				for (var i = 0; i < channels.length; i++) {
					channels[i].style.fontWeight = "400";
				}
				document.getElementById(channelActualID).style.fontWeight = "700";
			}				
			setInterval(function() {
				if(channelActualID != null) {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("chat").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET", "chat.php?channel=" + channelActualID, true);
					xmlhttp.send();
				}
			}, 3000);
			function loadChannels() {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("channels").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "channel.php", true);
				xmlhttp.send();
			};
			loadChannels();
			function loadMe() {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("meIcon").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "me.php", true);
				xmlhttp.send();
			}
			loadMe();
			function sendMessage() {
				var msg = $("#message-to-send").val();
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "send.php?message=" + msg + "&actualchannel=" + channelActualID, true);
				xmlhttp.send();
			}
		</script>
	</head>
	<body>
		<div class="row">
			<div class="logo col-lg-1 ">
				<div class="first-row">
					<center><img src="images/logo.svg" alt="Logo" /></center>
				</div>
			</div>
			<div class="col-lg-2 content chat-channels">
				<div class="first-row">
					<span class="title-head">TagChatter</span>
				</div>
				<div class="second-row">
					<div class="channels-title">
						CHANNELS
					</div>
					<div class="channels-name">
						<ul id="channels">
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 content chat-room">
				<div class="first-row">
					<span id="channel-name" class="title-head"></span>
				</div>
				<div id="chat" class="second-row">
				</div>
				<div id="send-message" class="third-row" >
					<div class="row middle">
						<div id="meIcon" class="col-sm-2">
						</div>
						<div class="col-sm-8">
							<center>
								<input type="text" class="form-control" id="message-to-send">
							</center>
						</div>
						<div class="col-sm-2">
							<center>
								<img class="send-button" src="images/send_icon.svg" alt="Send Icon" onclick="sendMessage();" />
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


