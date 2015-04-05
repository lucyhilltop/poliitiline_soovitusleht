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
	$FBID = $_POST['FBID'];
	$FBname = $_POST['FBname'];
	
	
	//kandidaadi lisamine
    $conn = connect();
	lisaKandi($conn);
	
	// Kontrollitakse, kas soovitaja on andmebaasis ja vajadusel lisatakse
	SoovitajaKontroll($conn);
	
	//Lisatakse lisamine
	lisaLisamine($conn);
}

// lisab kandidaadi andmebaasi
function lisaKandi($conn){
	$nimi = $_POST['nimi'];
    $number = $_POST['number'];
    $erakond = $_POST['erakond'];
	$kirjeldus = $_POST['kirjeldus'];
	
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

// kontrollib, kas soovitaja on andmebaasis
function SoovitajaKontroll($conn){
	$FBID = $_POST['FBID'];

	//kontroll, kas soovitaja on andmebaasis
	$sql ="SELECT count(*) as mitu FROM Soovitajad WHERE FBID= 10205553266944383";
	$stmt = sqlsrv_query($conn, $sql);
	
	while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
        $mitu=[
            "mitu"  => $row["mitu"],
        ];
    }
	if ($mitu["mitu"]==0){
	//kui soovitaja ei ole andmebaasis, sisi lisatakse
		lisaSoovitaja($conn);
	}
}

// lisab soovitaja andmebaasi
function lisaSoovitaja($conn){
	$FBID = $_POST['FBID'];
	$FBname = $_POST['FBname'];
	
		$sql = "INSERT INTO Soovitajad (nimi, FBID) VALUES (?, ?)";
		$params = array($FBname, $FBID);
		$stmt = sqlsrv_query($conn, $sql, $params);
		
		if( $stmt === false ) {
			die( print_r( "Ei saanud lisada teid andmebaasi : (", true));
		}else{
			print_r( "jeeee", true);
		}
    
}

// lisab lisamise andmebaasi
function lisaLisamine($conn){
	$FBID = $_POST['FBID'];
	$nimi = $_POST['nimi'];
	$number = $_POST['number'];
	
	$sql = "INSERT INTO Lisamine (SoovitajaID, KandidaadiID) VALUES (?, ?)";
	
	$SoovitajaID=leiaSoovitajaID($conn, $FBID);
	$KandidaadiID= leiaKandidaadiID($conn, $nimi, $number);

	
	$params = array($SoovitajaID, $KandidaadiID);
	$stmt = sqlsrv_query($conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( "Midagi läks väga valesti andmebaasiga : (", true));
	}else{
		$message="Weeeeeeeeee!!";
		echo $message;
	}
}

// lisab lisamise andmebaasi
function leiaKandidaadiID($conn, $nimi, $number){
	$sql = "SELECT ID FROM Kandidaadid WHERE nimi='".$nimi."' AND number=".$number;
	
	$stmt = sqlsrv_query($conn, $sql);
	while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
        $data=[
            "ID"  => $row["ID"],
        ];
    }
	return $data["ID"];
}

// lisab lisamise andmebaasi
function leiaSoovitajaID($conn, $FBID){
	$sql = "SELECT ID FROM Soovitajad WHERE FBID=".$FBID;

	$stmt = sqlsrv_query($conn, $sql);
	while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
        $data=[
            "ID"  => $row["ID"],
        ];
    }
	return $data["ID"];
}

?>