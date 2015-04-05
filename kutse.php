<?php
include ("header.php");
session_start();

require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphUser.php' );
require_once( 'Facebook/GraphSessionInfo.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;



//Validation ei tööta veel
$nameErr = $numErr = $partyErr = "";
$nimi = $number = $erakond ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nimi"])) {
        $nameErr = "Missing";
    }
    else {
        $nimi = $_POST["nimi"];
    }
 
    if (empty($_POST["number"])) {
        $addrErr = "Missing";
    }
    else {
        $number = $_POST["number"];
    }
 
    if (empty($_POST["erakond"]))  {
        $emailErr = "Missing";
    }
    else {
        $erakond = $_POST["erakond"];
    }
}


?>


<div id="invite">
    <?php
	
	$id = '233978436795874';
	$secret = '6cdfc674c3438ed6118754f617b503bb';

	FacebookSession::setDefaultApplication($id, $secret);

	$helper = new FacebookRedirectLoginHelper('http://localhost/veeb/poliitiline_soovitusleht/index.php');
	
	try{
	$session = $helper->getSessionFromRedirect();
	}catch(Exception $e){
	}

	$session = $helper->getSessionFromRedirect();
/*
if(isset($_SESSION['token'])){

	$session = new FacebookSession($_SESSION['token']);
	
	try{

		$session->Validate($id, $secret);

	}catch(FacebookAuthorizationException $e){

		$session = '';

	}

}
*/


	if(isset($session)){

		$_SESSION['token'] = $session->getToken();

		echo "Login Successful<br>";

		$request = new FacebookRequest($session, 'GET', '/me');

		$response = $request->execute();

		$graph = $response->getGraphObject(GraphUser::className());

		echo "Hi " . $graph->getName();

	}else{

		echo "<a href = " . $helper->getLoginUrl() . ">Login With Facebook</a>";

	}
	
	
	if (true){
		//Kui kasutaja on sisselogitud
	?>
	
	<p1>Siin saad lisada lehele uue kandidaadi</p1>
	<form method="post" action="funktsioonid/invite.php" onsubmit="return validateForm()">
			
		<label>Nimi</label>
		<input name="nimi" placeholder="Kandidaadi nimi" required>
		<span class="error"><?php echo $nameErr;?></span>
				
		<label>Number</label>
		<input name="number"  placeholder="Kandidaadi number" required>
		<span class="error"><?php echo $numErr;?></span>
		
		<label>Erakond</label>
		<input name="erakond"  placeholder="Kandidaadi erakond" required>
		<span class="error"><?php echo $partyErr;?></span>
		
		<label>Kirjeldus</label>
		<textarea name="kirjeldus" placeholder="Lühike ülevaade kandidaadist"></textarea>
				
		<input id="submit" name="submit" type="submit" value="Submit">
			
	</form>
	
	<?php
	} else {
		// Kui kasutaja ei ole sisse loginud
	?>
	<p1>Kandidaadi lisamiseks palun logi sisse : )</p1>
	
	<CENTER>
	<fb:login-button autologoutlink="true" scope="public_profile,email" data-size="xlarge" onlogin="checkLoginState();">
	</fb:login-button>
	</CENTER>
	
	<script src="js/facebook.js"></script>
	<p1></p1>
	<div id="status">
	</div>

	<?php
	}
	?>
	
</div>
</div>
<?php

include ("footer.php");
?>


