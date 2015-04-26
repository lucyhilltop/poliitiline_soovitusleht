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
	$conn = connect();
			$sql = "SELECT * FROM Kandidaadid";
			$stmt=sqlsrv_query($conn, $sql);
			
			$kandiID=0;
			
			$miturida=0;
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
				  echo '<div id="osa1"><h2><a
					id='.$row["ID"].'
					onClick="$kandiID=this.id;getDataKandi($kandiID);"
					test style="text-decoration:none"
					href="#"
				  >'."nr"." ".$row['number']."  ".$row['nimi'].'</a></h2></div>';
				  $miturida++;
				  //history.pushState({},"URL Rewrite Example","http://valimissoovitus.azurewebsites.net/kandidaadid.php/$kandiID")
				  
			}
			//kui on vähe liikmeid, siis kuvatakse tyhju kaste. Lihtsalt visuaalne asi.
			while($miturida<13){
				echo '<tr><td><a href="kandidaadid.php" class="button"></a></td></tr>';
				$miturida++;
			}
}
// eitoota korralikult
function getAll($table)
{
    $conn = connect();
    $sql = "SELECT * FROM ".$table;
    return $stmt =sqlsrv_query($conn, $sql);


}
//REFRESHI FUNKTSIOON
//function getcount(){
//	$conn = connect();
//	$sql = "SELECT COUNT(*) FROM Kandidaadid";
//	$stmt=sqlsrv_query($conn, $sql);
//	$arv = mysql_num_rows($stmt);
//	echo "$arv";
//}
//int mysql_num_rows ( resource $result )

//function setInterval($f, $milliseconds)
//{
//    $seconds=(int)$milliseconds/1000;
//    while(true)
 //   {
 //       echo $f;
 //       sleep($seconds);
 //   }
//}
// votab koik info kandidaadaadi kohta
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
