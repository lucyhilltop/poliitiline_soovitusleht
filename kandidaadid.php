﻿<!DOCTYPE html>

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
	
	$sql = "SELECT nimi FROM Kandidaadid";	
	mysql_select_db("andmebaas");
	$retval = mysql_query( $sql, $conn );
	echo "<h2>a</h2>";
	
	if(! $retval )
	{
	  die('EI SAANUD ANDMEID!!!!: ' . mysql_error());
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo "EMP ID :{$row['emp_id']}  <br> ".
			 "EMP NAME : {$row['emp_name']} <br> ".
			 "EMP SALARY : {$row['emp_salary']} <br> ".
			 "--------------------------------<br>";
	} 
	echo "Fetched data successfully\n";
	mysql_close($conn);
			
	?>
	
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
	
	$data = mysql_query("SELECT * FROM Kandidaadid")  or die(mysql_error()); 
	echo"<table border cellpadding=3>"; 
	while($row= mysql_fetch_array( $data )) 
	 { 
		echo"<tr>"; 
		echo"<th>nimi:</th> <td>".$row['nimi'] . "</td> "; 
		echo"<th>number:</th> <td>".$row['number'] . " </td></tr>"; 
		echo"<th>kirjeldus:</th> <td>".$row['kirjeldus'] . "</td> "; 
		echo"<th>Price:</th> <td>".$row['Price'] . " </td></tr>"; 
	 } 
	 echo"</table>"; 
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
