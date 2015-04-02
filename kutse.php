<?php
include ("header.php");
include ("dbfun.php");
?>


<div id="invite">
    
	<form>
			
		<label>Nimi</label>
		<input name="name" placeholder="Kandidaadi nimi">
				
		<label>Number</label>
		<input name="email" type="email" placeholder="Kandidaadi number">
		
		<label>Erakond</label>
		<input name="email" type="email" placeholder="Kandidaadi erakond">
		
		<label>Kirjeldus</label>
		<textarea name="message" placeholder="Lühike ülevaade kandidaadist"></textarea>
				
		<input id="submit" name="submit" type="submit" value="Submit">
			
	</form>
</div>
<?php
include ("footer.php");
?>