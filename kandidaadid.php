﻿<?php
include ("header.php");
?>
	
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
    }
   
    echo "<h2>Lõpetan</h2>";
	/*

	
	$sql = "SELECT * FROM Kandidaadid";
	$result = mysqli_query($conn, $sql);
	

	if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo " - Name: " . $row["nimi"]."<br>";
    }
	} else {
		echo "0 results";
	}
	*/
	
	$data = mysql_query("SELECT * FROM friends")  or die(mysql_error()); 
	Print "<table border cellpadding=3>"; 
	while($info = mysql_fetch_array( $data ))  
	{  
	Print "<tr>"; 
	Print "<th>Name:</th> <td>".$info['nimi'] . "</td> ";  
	//Print "<th>Pet:</th> <td>".$info[''] . " </td></tr>";  }  
	Print "</table>"; 
	
	
	
	mysql_close($conn);
			
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

<?php
include ("footer.php");
?>