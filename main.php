<!DOCTYPE html>
<?php 	require_once("login.php");
		$db_server = mysql_connect($db_hostname, $db_username, $db_password);
		mysql_select_db($db_database, $db_server);	?>
<html>
<head>
<title>Where's It Made?</title>
<link rel="stylesheet" type="text/css" href="mainsheet.css" />
<script src="http://www.lathamcity.com/_js/jquery-1.7.js"></script>
<script src="http://www.lathamcity.com/_js/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
	$('#newitem').validate({
		rules: {
			new_item_name: {
				required: true,
				minlength: 2
				},
			new_item_store: {
				required: true,
				minlength: 2
				},
			new_item_price: {
				required: true,
				number: true,
				min: 0
				},
			new_item_address: {
				required: true,
				minlength: 2
				},
			new_item_description: {
				required: true,
				minlength: 1
				},
			new_item_zip: {
				required: true,
				digits: true,
				range: [10000, 99999]
				}
		}
	});
	<?php $zip = $_POST['zip']; 
	if ($zip == null){
		echo "window.location.replace('http://lathamcity.com/wheresitmade/index.php');";
		}
	?>
}); //end ready
</script>
</head>

<body>
<div id="header">
	<span id="zip">
		<?php echo "$zip"; ?>
	</span>
	
	<div id="in_header">
		<form method="post" action="main.php" id="form_itemsearch">
			<span id="search_prompt">Search for an item</span>
			<input type="name" size="30" maxlength="100" />
			<input type="submit" value="Submit" />
		</form>
	
		<form method="post" action="main.php" id="form_sort">
			<span id="sort_prompt">Sort by:</span>
			<select name="sort" size="1">
				<option value="name">Name</option>
				<option value="pricehl">Price: High to Low</option>
				<option value="pricelh">Price: Low to High</option>
				<option value="country">Country of Origin</option>
			</select>
		</form>
	</div>
</div>
<div id="center">
	<table id="center_table">
		<tr id="center_header">
			<td style="width: 12%">Item</td>
			<td style="width: 8%">Price</td>
			<td style="width: 30%">Description</td>
			<td style="width: 25%">Store Location</td>
			<td style="width: 10%">Zip Code</td>
			<td style="width: 15%">Country of Origin</td>
		</tr>
<?php	$query = "SELECT * FROM main WHERE zip=\"$zip\"";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
		for ($i = 0; $i < $rows; $i++){
			echo "<tr>";
			$thisrow = mysql_fetch_row($result);
			for ($j = 1; $j < 7; $j++)
				echo "<td>$thisrow[$j]</td>";
			echo "</tr>";
		} ?>
	
	</table>
</div>

<div id="newitem_div">
	<span id="formprompt">Enter an item</span>
	<form id="newitem">
	<table id="newitem_table">
		<tr>
			<td class="col1">Item: <input type="name" name="new_item_name" size="30" maxlength="100" class="new_entry"/></td>
			<td class="spacer">
			<td class="col2">Store: <input type="name" name="new_item_store" size="30" maxlength="100" class="new_entry"/></td>
		</tr>
		<tr>
			<td class="col1">Price: <span="new_item_price" class="new_entry">$<input type="name"  name="new_item_price" size="30" maxlength="30" /></span></td>
			<td class="spacer">
			<td class="col2">Address: <input type="name" name="new_item_address" size="30" maxlength="100" class="new_entry"/></td>
		</tr>
		<tr>
			<td class="col1">Description: <input type="name" name="new_item_description" size="30" maxlength="100" class="new_entry"/></td>
			<td class="spacer">
			<td class="col2"><input type="name" name="new_item_zip" size="5" maxlength="5" class="new_entry"/><span class="new_entry">Zip Code:&nbsp&nbsp&nbsp</span></td>
		</tr>
	</table>
	<div id="button_div">
		<input type="submit" value="Submit" id="new_submit"/>
	</div>
		<input type="hidden" name="zip" value="<?php echo "$zip" ?>" />
	</form>
	<div id="foot"></div>
</div>
</body>
</html>
<?php mysql_close($db_server); ?>