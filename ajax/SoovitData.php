<?php
//XMLitakse siin
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";

echo "<response>\n";
if (isset($_POST["ID"])=== true && empty($_POST["ID"])=== false) {
	require '../funktsioonid/dbfun.php';
	$data=getOneSoovit($_POST["ID"] );
	
	echo "<nimi>";
		echo $data["nimi"]."\n";
	echo"</nimi>";
	
	echo "<toetanud>";
		echo $data["toetanud"]."\n";
	echo"</toetanud>";
	

}
else{
	echo "ei toota";
}
echo "</response>\n";
?>
