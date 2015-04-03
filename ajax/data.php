<?php
//XMLitakse
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";

echo "<response>\n";
if (isset($_POST["ID"])=== true && empty($_POST["ID"])=== false) {
	require '../funktsioonid/dbfun.php';
	$data=getOneKandi($_POST["ID"] );
	
	echo "<nimi>";
		echo $data["nimi"]."\n";
	echo"</nimi>";
	
	echo "<number>";
		echo $data["number"]."\n";
	echo"</number>";
	
	echo "<erakond>";
		echo $data["erakond"]."\n";
	echo"</erakond>";
	
	echo "<kirjeldus>";
		echo $data["kirjeldus"]."\n";
	echo"</kirjeldus>";
	

	//echo $data["number"]."\n";
}
else{
	echo "ei toota";
}
echo "</response>\n";
?>


<?PHP
/*
// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

class xmlResponse
{

  function start()
  {
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
    echo "<response>\n";
  }

  function command($method, $params=array(), $encoded=array())
  {
    echo "  <command method=\"$method\">\n";
    if($params) {
      foreach($params as $key => $val) {
        echo "    <$key>" . htmlspecialchars($val) . "</$key>\n";
      }
    }
    if($encoded) {
      foreach($encoded as $key => $val) {
        echo "    <$key><![CDATA[$val]]></$key>\n";
      }
    }
    echo "  </command>\n";
  }

  function end()
  {
    echo "</response>\n";
    exit;
  }

}
*/
?>