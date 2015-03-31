<?php
include ("header.php");
?>

	<form action="#">
            <input id="searchbox" type="text" placeholder="Search..." required>
            <input id="searchbutton" type="submit" value="">
	</form>
	
	<?php
	$conn = connect();
	
	$sql = "SELECT * FROM Soovitajad";
	echo "<h2>sql valitud</h2>";
	try {
		echo "Olen try sees";
		$resultSet = $conn->query("SELECT * FROM Kandidaadid");
		echo "Väljun try'st";
	}
	catch(Exception $e) {
       	echo "<h2>$e</h2>";
    }
	echo "<h2>result valitud</h2>";
	if ($resultSet->num_rows > 0) {
	// output data of each row
		while($row = $resultSet->fetch_assoc()) {
			echo "id: " . $row["id"]. " - Name: " . $row["nimi"]."<br>";
				}
		} else {
			echo "<h2>0 tulemust</h2>";
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
<?php
include ("footer.php");
?>