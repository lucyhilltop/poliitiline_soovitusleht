<?php
include ("header.php");
include ("funktsioonid/dbfun.php");

?>
	
	<div id="navigation">
	
		<?php
		
			$conn = connect();
			$sql = "SELECT * FROM Soovitajad";
			$stmt=sqlsrv_query($conn, $sql);
			$miturida=0;
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
				  echo '<div id="osa1">
                        <h2><a href="#' . $row["ID"] . '" style="text-decoration:none"
					id='.$row["ID"].'
					onClick="getDataSoov(this.id)
										trellid()"
				  >'.$row['nimi'].'</a></h2></div>';
				  $miturida++;
			}
			//kui on vähe liikmeid, siis kuvatakse tyhju kaste. Lihtsalt visuaalne asi.
			while($miturida<13){
				echo '<tr><td><a href="kandidaadid.php" class="button"></a></td></tr>';
				$miturida++;



}
		?>

	</div>

	
	<div id="fb">
		<fb:login-button autologoutlink="true" scope="public_profile,email" data-size="medium" 
		onlogin="checkLoginState();">
		</fb:login-button>

		<script src="js/facebook.js"></script>
		
		
	
	</div>
	
	
	
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/konteinerism.js"></script>

	<div id="nurkkonteiner">
		<h1 id="SNimi">Nimi</h1>

		<p id="SToetatud">
		toeatatud
		</p>
		
	</div>
</div>
<?php
include ("footer.php");
?>