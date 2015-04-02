<?php

if (isset($_POST["ID"])=== true && empty($_POST["ID"])=== false) {
	require '../funktsioonid/dbfun.php';
	$data=getOneKandi($_POST["ID"] );
	echo $data["nimi"];
	
}


?>