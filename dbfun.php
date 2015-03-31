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




?>