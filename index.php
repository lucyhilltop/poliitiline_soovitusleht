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
<span id="countdown">21 päeva, 2 tundi, 5 minutit, 14 sekundit</span>
 
     <h3>Erakondade populaarsus:</h3>
     <canvas id="pirukas" width="400" height="400"></canvas>
 
 </div>
 
 <div class="clear"></div>
 
 <script type="text/javascript" src="countdown.js"></script>
<script src="js/facebook.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script src="pirukas.js"></script>
<?php include ("footer.php"); ?>
