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
					echo '<li><a href="kandidaadid.html">'.$kandi.'</a></li> ';
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
	
	<div id="graaf">
		<h3>Aega järgmiste valimisteni:</h3>
			<img src="pildid/counter.jpg" alt="counter">
		<h3>Erakondade populaarsus:</h3>
			<img src="pildid/pirukas.png" alt="pirukas">
	</div>
	
	<div class="clear"></div>
</div>
<?php
include ("footer.php");
?>