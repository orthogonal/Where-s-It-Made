<!DOCTYPE html>
<html>
<head>
<title>Where's It Made?</title>
<link rel="stylesheet" type="text/css" href="sheet1.css" />
<script src="http://www.lathamcity.com/_js/jquery-1.7.js"></script>
<script>
$(document).ready(function() {
	
}); //end ready
</script>
</head>

<body>
<div id="top">
	<div id="picture">
		<img id="mapimg" src="worldmap.png"></img>
		<span id="title">Where's It Made?</span>
	</div>
</div>

<div id="formDiv">
	<form method="post" action="main.php" id="search">
		<table>
		<tr><td>
			<span id="prompt">Enter Zip Code:</span>
			<input type="text" name="zip" size="10" maxlength="5" />
		</tr></td>
		<tr><td id="buttonRow">
		<input type="submit" value="Submit" />
		</tr></td>
		</table>
	</form>
</div>

<div id="links">
	<button id="about_button" onclick="window.location.href='about.html'">About</button>
	<button id="contact_button" onclick="window.location.href='contact.php'">Contact</button>
	<button id="investors_button" onclick="window.location.href='investors.php'">Investors</button>
	<button id="faq_button" onclick="window.location.href='faq.php'">FAQ</button>
</div>

</body>

</html>