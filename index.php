<?php
include ("header.php");
include ("funktsioonid/dbfun.php");
?>

	<div id= "populaarsed">
		<h1> Populaarseimad kandidaadid:</h1>
			<ol>
			<?php
				$top=getTop();
				foreach ($top as $kandi){
					echo '<li><a href="#">'.$kandi.'</a></li> ';
				}
			/*
				while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
				  echo '<tr><td><a href="#" class="button"
					id='.$row["ID"].'
					onClick="getDataKandi(this.id)"  
				  >'."nr"." ".$row['number']."  ".$row['nimi'].'</a></td></tr>';
			}
			*/
			?>
			</ol>
	</div>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="pirukas.js">
    </script>
	<div id="graaf">
		<h3>Aega järgmiste valimisteni:</h3>
			<span id="countdown">21 päeva, 2 tundi, 5 minutit, 14 sekundit</span>
        <script src="countdown.js"></script>
		<h3>Erakondade populaarsus:</h3>
        <div id="donutchart" style="height: 400px; width: 500px;"></div>
	</div>
	
	<div class="clear"></div>
</div>
<?php
include ("footer.php");
?>