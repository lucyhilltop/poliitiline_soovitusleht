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
		
		<?php
					$servername = "ejx5shwlyf.database.windows.net";
					$username = "server";
					$password = "Parool11";
					$dbname = "andmebaas2";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed!!!! : ( - " . $conn->connect_error);
					} 

					$sql = "SELECT * FROM Kasutajad";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "id: " . $row["id"]. " - Name: " . $row["nimi"]."<br>";
						}
					} else {
						echo "0 results";
					}
					$conn->close();
					?>
		
		
		
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

</body>
</html>
