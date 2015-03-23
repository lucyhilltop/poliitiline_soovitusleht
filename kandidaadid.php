<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Kandidaadid</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<style type="text/css"></style>
</head>
<body

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
	
	<table id="soovitajad">
		<thead>
			<tr>
				<th>Kandidaadid</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a href="kandidaadid.php" class="button">nr 100 Silver Pajumäe</a></td>
			</tr>
			<tr>
				<td><a href="kandidaadid.php" class="button">nr 101 Liis Mäeots</a></td>
			</tr>
			<tr>
				<td><a href="kandidaadid.php" class="button">nr 102 Karl Erki Jürgen</a></td>
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
<?php
// Connect to database server
	\r\n\r\ntry {\r\n   $conn = new PDO ( \"sqlsrv:server = tcp:ejx5shwlyf.database.windows.net,1433;
	Database = andmebaas\", \"server\", \"Parool11\");
	\r\n    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	\r\n}\r\ncatch ( PDOException $e ) {\r\n   print( \"Error connecting to SQL Server.\" );
	\r\n   die(print_r($e));
	\r\n}
	\r\n\r\n$connectionInfo = array(\"UID\" => \"server@ejx5shwlyf\", \"pwd\" => \"Parool11\", \"Database\" => \"andmebaas\", \"LoginTimeout\" => 30, \"Encrypt\" => 1);
	\r\n$serverName = \"tcp:ejx5shwlyf.database.windows.net,1433\";
	\r\n$conn = sqlsrv_connect($serverName, $connectionInfo);
	?>

</body>
</html>
