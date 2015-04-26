<?php
include ("header.php");
include ("funktsioonid/dbfun.php");
?>
	
	<div id="navigation">

		<?php	
			getcount();
			tabelitaide();
			
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
