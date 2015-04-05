<?php
include ("header.php");
include ("funktsioonid/dbfun.php");
session_start(); 
?>
	<?php

	echo "Kasutaja on " . $_SESSION["kasutaja"] . ".<br>";

?>
	<form action="#">
            <input id="searchbox" type="text" placeholder="Search..." required>
            <input id="searchbutton" type="submit" value="">
	</form>
	
	<table id="soovitajad">
		<thead>
			<tr>
				<th>Soovitajad</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
			$conn = connect();
			$sql = "SELECT * FROM Soovitajad";
			$stmt=sqlsrv_query($conn, $sql);
			
			$miturida=0;
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
				  echo '<tr><td><a href="#" class="button"
					id='.$row["ID"].'
					onClick="getDataSoov(this.id)"  
				  >'.$row['nimi'].'</a></td></tr>';
				  $miturida++;
			}
			//kui on vähe liikmeid, siis kuvatakse tyhju kaste. Lihtsalt visuaalne asi.
			while($miturida<13){
				echo '<tr><td><a href="kandidaadid.php" class="button"></a></td></tr>';
				$miturida++;
			}
		?>
		</tbody>
	</table>
	
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