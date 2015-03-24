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
	echo "<h2>Alustan</h2>";
	$server = "tcp:ejx5shwlyf.database.windows.net,1433";
    $user = "server@ejx5shwlyf";
    $pwd = "Parool11";
    $db = "andmebaas";
    echo "<h2>Alustan Connectimist</h2>";
    $conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db));

    if($conn == false){
    	echo "<h2>Error</h2>";
        die(print_r(sqlsrv_errors()));
    
	$sql = "SELECT * FROM Soovitajad";
					$result = $conn->query($sql);
					
					echo "A";
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "id: " . $row["id"]. " - Name: " . $row["nimi"]."<br>";
						}
					} else {
						echo "0 results";
					}
    echo "<h2>Lõpetan</h2>";
}
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
