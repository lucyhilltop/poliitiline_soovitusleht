<?php

include ("funktsioonid/dbfun.php");
$top=getTop();

/*
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
      echo '<tr><td><a href="#" class="button"
        id='.$row["ID"].'
        onClick="getDataKandi(this.id)"
      >'."nr"." ".$row['number']."  ".$row['nimi'].'</a></td></tr>';
}
*/

include("header.php");
?>

<div id= "populaarsed">

    <h1> Populaarseimad kandidaadid:</h1>

    <ol>
        <?php foreach ($top as $kandi): ?>
        <li><a href="#"><?=$kandi?></a></li>
        <?php endforeach; ?>
    </ol>
</div>
	
<div id="fb">
    <fb:login-button autologoutlink="true" scope="public_profile,email" data-size="medium"
    onlogin="checkLoginState();">
    </fb:login-button>

    <div id="status">
    </div>
</div>

<div id="graaf">
    <h3>Aega järgmiste valimisteni:</h3>
    <script>
    	// set the date we're counting down to
var target_date = new Date(2017,9,15).getTime();

// variables for time units
var days, hours, minutes, seconds;

// get tag element
var countdown = document.getElementById("countdown");

// update the tag with id "countdown" every 1 second
setInterval(function () {

    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;

    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;

    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;

    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);

    // format countdown string + set tag value
    countdown.innerHTML = days + " pÃ¤eva, " + hours + " tundi, "
    + minutes + " minutit, " + seconds + " sekundit";

}, 1000);
    </script>
    <span id="countdown">21 päeva, 2 tundi, 5 minutit, 14 sekundit</span>

    <h3>Erakondade populaarsus:</h3>
    <canvas id="pirukas" width="400" height="400"></canvas>

</div>

<div class="clear"></div>

<script src="js/facebook.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script src="pirukas.js"></script>
<?php include ("footer.php"); ?>
