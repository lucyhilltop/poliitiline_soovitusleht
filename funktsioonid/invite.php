<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="refresh" content="3;url=../index.php" />
    </head>
    <body>
        <h1>Suunan pealehele kolme sekundi parast...</h1>
    </body>
</html>


<?php
include ("dbfun.php");


if ($_POST['submit']) {
	$nimi = $_POST['nimi'];
    $number = $_POST['number'];
    $erakond = $_POST['erakond'];
	$kirjeldus = $_POST['kirjeldus'];

    $conn = connect();
	$sql = "INSERT INTO Kandidaadid (nimi, number, erakond, kirjeldus) VALUES (?, ?, ?, ?)";

	
	$params = array($nimi, $number, $erakond, $kirjeldus);
	$stmt = sqlsrv_query($conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( "Midagi läks väga valesti andmebaasiga : (", true));
	}else{
		$message="Kandidaat on lisatud lehele!!!";
		echo $message;
	}
	
}

?>
