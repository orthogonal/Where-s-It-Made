<!DOCTYPE html>
<html>
<head>
<title>Where's It Made?</title>
<link rel="stylesheet" type="text/css" href="sheet1.css" />
<script src="http://www.lathamcity.com/_js/jquery-1.7.js"></script>
<script src="http://www.lathamcity.com/_js/jquery.validate.min.js"></script>
<script src="http://www.lathamcity.com/_js/jquery.backstretch.min.js"></script>
<script>
$(document).ready(function() {
	$('#zip_enter').focus();
	
	$('#search').submit(function(evt){
		if (!$('#search').valid()){
			alert("Please enter a valid zip code.");
			evt.preventDefault();
		}
	});

	$('#search').validate({
		rules: {
			zip: {
					required: true,
					range: [10000, 99999]
				}
		},
		
		messages: {
			zip: {
					required: "",
					range: ""
				}
		}
	});
}); //end ready
</script>
</head>

<body>
<div id="top">
	<div id="picture">
		<!-- <img id="mapimg" src="worldmap.png"></img> -->
	</div>
</div>

<div id="formDiv">
	<form method="post" action="main.php" id="search">
		<table class="homecenter">
		<tr><td class="homecenter">
			<span id="prompt">Enter Zip Code:</span>
			<input type="text" id="zip_enter" name="zip" size="10" maxlength="5" />
		</td></tr>
		<tr><td id="buttonRow" class="homecenter">
		<input type="submit" value="Submit"/>
		</td></tr>
		</table>
	</form>
</div>

<div id="links">
	<button id="about_button" onclick="window.location.href='about.html'">About</button>
	<button id="contact_button" onclick="window.location.href='contact.html'">Contact</button>
	<button id="investors_button" onclick="window.location.href='investors.html'">Investors</button>
	<button id="faq_button" onclick="window.location.href='faq.html'">FAQ</button>
</div>

</body>

</html>