<?php
include ("header.php");
include ("funktsioonid/dbfun.php");

?>
	
	<div id="navigation">
        <script type="text/javascript" language="javascript">

            $(function(){

              // Bind an event to window.onhashchange that, when the hash changes, gets the
              // hash and adds the class "selected" to any matching nav link.
              $(window).hashchange( function(){
                var hash = location.hash;

                // Set the page title based on the hash.
                document.title = 'The hash is ' + ( hash.replace( /^#/, '' ) || 'blank' ) + '.';
                
                // Iterate over all nav links, setting the "selected" class as-appropriate.
                $('#osa1 a').each(function(){
                  var that = $(this);
                  that[ that.attr( 'href' ) === hash ? 'addClass' : 'removeClass' ]( 'selected' );
                });
              })

              // Since the event is only triggered when the hash changes, we need to trigger
              // the event now, to handle the hash the page may have loaded with.
              $(window).hashchange();

            });

            $(function(){

              // Syntax highlighter.
              SyntaxHighlighter.highlight();

            });

    </script>
		<?php
		
			$conn = connect();
			$sql = "SELECT * FROM Soovitajad";
			$stmt=sqlsrv_query($conn, $sql);
			$miturida=0;
            $idee = 0;
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
                $idee = $row["ID"];
				  echo '<div id="osa1">
                        <h2><a href="#' . $idee . '" style="text-decoration:none"
					id='.$idee.'
					onClick="getDataSoov(this.id)"
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