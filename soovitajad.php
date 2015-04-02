<?php
include ("header.php");
include ("funktsioonid/dbfun.php");
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
			  echo '<tr><td><a href="kandidaadid.php" class="button">'.$row['nimi'].'</a></td></tr>';
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
</div>
<?php
include ("footer.php");
?>