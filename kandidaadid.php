<?php
include ("header.php");
include ("funktsioonid/dbfun.php");
?>
	
	<div id="navigation">

		<?php	
			function setInterval($f, $milliseconds)	{
				 $seconds=(int)$milliseconds/1000;
    				while(true) {
					 $f();
        				sleep($seconds);}}
			$conn = connect();
			$sql = "SELECT * FROM Kandidaadid";
			$stmt=sqlsrv_query($conn, $sql);
			
			$kandiID=0;
			
			$miturida=0;
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
				  echo '<div id="osa1"><h2><a
					id='.$row["ID"].'
					onClick="$kandiID=this.id;getDataKandi($kandiID);"
					test style="text-decoration:none"
					href="#"
				  >'."nr"." ".$row['number']."  ".$row['nimi'].'</a></h2></div>';
				  $miturida++;
				  //history.pushState({},"URL Rewrite Example","http://valimissoovitus.azurewebsites.net/kandidaadid.php/$kandiID")
				  
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
		
	<div id="nurkkonteiner">
		<h1 id="KNimi">Nimi</h1>
		<h2 id="KNumber">Number</h2>
		<p id="KErakond">
		Erakond
		</p>

		<p id="KKirjeldus">
		Kirjeldus
		</p>
	
	
	<div id="toetus">
		<div id="toetusMessage">
			<label >Toetustearv tuleb siia</label>
		</div>
		<input onclick="like('tainas','myID')" type="image" src="css/pildid/up.png" alt="Toetan!" width="110" height="80";>
		
		<input  type="hidden" value="z" id="myID"/>
		<input type="hidden" value="z" id="KandiID"/>
		
	</div>
	
	
	
	
	</div>
	
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/konteinerism.js"></script>
	<script src="js/toetus.js"></script>

	
</div>

<?php
include ("footer.php");
?>
