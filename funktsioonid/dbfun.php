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
	$conn = connect();
	$sql = "SELECT Kandidaadid.nimi, Kandidaadid.number, Erakonnad.ErakonnaNimi, Kandidaadid.kirjeldus
	FROM Kandidaadid
	INNER JOIN Erakonnad
	ON Kandidaadid.erakond=Erakonnad.ID
	WHERE Kandidaadid.ID=".$id;
	
	
	$stmt=sqlsrv_query($conn, $sql);

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

// votab koik info soovitaja kohta
function getOneSoovit($id)
{
	$conn = connect();
	$sql = "SELECT Kandidaadid.nimi, Kandidaadid.number, Erakonnad.ErakonnaNimi, Kandidaadid.kirjeldus
	FROM Kandidaadid
	INNER JOIN Erakonnad
	ON Kandidaadid.erakond=Erakonnad.ID
	WHERE Kandidaadid.ID=".$id;
	
	
	$stmt=sqlsrv_query($conn, $sql);

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

// votab koik info soovitaja kohta
function getTop()
{
	$conn = connect();
	$sql = "SELECT TOP 3 Kandidaadid.nimi, COUNT(Toetus.KandidaadiID) AS Toetatud FROM Toetus
	LEFT JOIN Kandidaadid
	ON Toetus.KandidaadiID=Kandidaadid.ID
	GROUP BY nimi
	ORDER BY Toetatud DESC";
	
	$stmt=sqlsrv_query($conn, $sql);
	$data=array();
	
	while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
		array_push($data, $row["nimi"]);
		
	}
	return $data;

}

?>
