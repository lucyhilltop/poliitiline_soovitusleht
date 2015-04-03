<?php
//andmebaassiga yhendamine
function connect()
{
	$server = "tcp:ejx5shwlyf.database.windows.net, 1433";
    $user = "server@ejx5shwlyf";
    $pwd = "Parool11";
    $db = "andmebaas";
	try{
		$conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db, "CharacterSet" => "UTF-8"));
	}
	catch(Exception $e){
		die(print_r($e));
	}
	return $conn;
}

// eitoota korralikult
function getAll($table)
{
	$conn = connect();
	$sql = "SELECT * FROM ".$table;
	return $stmt =sqlsrv_query($conn, $sql);
	
	
}

// votab koik info kandidaadaadi kohta
function getOneKandi($id)
{
	/*
	include "class.xmlresponse.php";
	$xml = new xmlResponse();
	$xml->start();
	*/
	
	$conn = connect();
	//$sql = "SELECT * FROM Kandidaadid WHERE Kandidaadid.ID=".$id;
	
	$sql = "SELECT Kandidaadid.nimi, Kandidaadid.number, Erakonnad.ErakonnaNimi, Kandidaadid.kirjeldus
	FROM Kandidaadid
	INNER JOIN Erakonnad
	ON Kandidaadid.erakond=Erakonnad.ID
	WHERE Kandidaadid.ID=".$id;
	
	
	$stmt=sqlsrv_query($conn, $sql);
	/*
	$xml->command("indiviid",
    array("nimi"  => $row["nimi"], "number" =>$row['number'], "erakond" =>$row['erakond'],"kirjeldus" =>$row['kirjeldus'])
	);
	*/
	while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
		$data=[
		"nimi"  => $row["nimi"],
		"number" =>$row['number'],
		"erakond" =>$row['ErakonnaNimi'],
		"kirjeldus" =>$row['kirjeldus']
		];
		
	}
	return $data;

	
}



?>