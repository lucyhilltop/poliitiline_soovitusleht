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

function tabelitaide(){

}
// eitoota korralikult
function getAll($table)
{
    $conn = connect();
    $sql = "SELECT * FROM ".$table;
    return $stmt =sqlsrv_query($conn, $sql);


}
//REFRESHI FUNKTSIOON
function getcount() {
	$conn = connect();
	$sql = "SELECT * FROM Kandidaadid";
	$params = array("updated data", 1);
	$stmt = sqlsrv_query( $conn, $sql, $params);
	$rows_affected = sqlsrv_rows_affected( $stmt);
if( $rows_affected === false) {
     die( print_r( sqlsrv_errors(), true));
} elseif( $rows_affected == -1) {
      echo "No information available.<br />";
} else {
      echo $rows_affected." rows were updated.<br />";
}

 //votab koik info kandidaadaadi kohta
function getOneKandi($id)
{
    $conn = connect();
    $sql = "SELECT Kandidaadid.nimi, Kandidaadid.number, Erakonnad.ErakonnaNimi, Kandidaadid.kirjeldus, Kandidaadid.ID
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
            "kirjeldus" =>$row['kirjeldus'],
			"ID" =>$row['ID']
        ];

    }
    return $data;
}
// votab koik info soovitaja kohta
function getOneSoovit($id)
{
    $conn = connect();
    $sql = "SELECT Soovitajad.nimi, COUNT(Toetus.SoovitajaID) AS toetanud FROM Toetus
	LEFT JOIN Soovitajad
	ON Soovitajad.ID=Toetus.SoovitajaID
	WHERE Soovitajad.ID=".$id."
	GROUP BY nimi";


    $stmt=sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
        $data=[
            "nimi"  => $row["nimi"],
            "toetanud" =>$row['toetanud'],
        ];
    }
	
	if (!isSet($data)){
		 $sql = "SELECT nimi FROM Soovitajad WHERE Soovitajad.ID=".$id;
		 $stmt=sqlsrv_query($conn, $sql);
		 
		 while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
			$data=[
				"nimi"  => $row["nimi"],
				"toetanud" =>"0",
			];
    }
	}
	
    return $data;
}
// votab top 3e 
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
function getPie () {
    $conn = connect();
    $sql = "SELECT * FROM pirukas";
    $stmt = sqlsrv_query($conn, $sql);
    $data=array();

    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
        array_push($data, $row);
    }
    return $data;
}
?>
