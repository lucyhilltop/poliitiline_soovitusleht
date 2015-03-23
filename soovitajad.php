<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Soovitajad</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<style type="text/css"></style>
</head>
<body>

<div id ='konteiner'>	
	<div id='pais'>
			<p id='pealkiri'>Poliitiline soovitusleht</p>
    </div>
	<ul id="lehed">
	<li><a href="index.html" class="button">Avaleht</a></li>
	<li><a href="soovitajad.php" class="button">Soovitajad</a></li>
	<li><a href="kandidaadid.php" class="button">Kandidaadid</a></li>
	<li><a href="kutse.html" class="button">Kutse</a></li>
	<li><a href="minukandidaadid.html" class="button">Minu kandidaadid</a></li>
	</ul>
	
	<form action="#">
            <input id="searchbox" type="text" placeholder="Search..." required>
            <input id="searchbutton" type="submit" value="">
	</form>
	
	<?php
	# Connect
	mysql_connect('ejx5shwlyf.database.windows.net', 'server', 'Parool11') or die('Could not connect: ' . mysql_error());
	 
	# Choose a database
	mysql_select_db('andmebaas') or die('Could not select database');
	 
	# Perform database query
	$query = "SELECT * from Soovitajad";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	 
	# Filter through rows and echo desired information
	while ($row = mysql_fetch_object($result)) {
		echo $row->name;
	}
	?>
	 
	<?php
	/*
	// Connect to database server
	mysql_connect("ejx5shwlyf.database.windows.net", "server", "Parool11") or die (mysql_error ());

	// Select database
	mysql_select_db("andmebaas") or die(mysql_error());

	// SQL query
	$strSQL = "SELECT * FROM Kandidaadid";

	// Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($strSQL);
	
	// Loop the recordset $rs
	while($row = mysql_fetch_array($rs)) {

	  }

	// Close the database connection
	mysql_close();
	*/
	?>
	
	
	<table id="soovitajad">
		<thead>
			<tr>
				<th>Soovitajad</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a href="kandidaadid.html" class="button">Silver Pajumäe</a></td>
			</tr>
			<tr>
				<td><a href="kandidaadid.html" class="button">Liis Mäeots</a></td>
			</tr>
			<tr>
				<td><a href="kandidaadid.html" class="button">Karl Erki Jürgen</a></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
</body>
</html>
