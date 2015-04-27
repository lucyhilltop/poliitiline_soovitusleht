<?php
include ("funktsioonid/dbfun.php");

$conn = connect();
$sql = 'SELECT * FROM Kandidaadid';
$stmt=sqlsrv_query($conn, $sql);

$kandiID=0;
$tableData = [];

while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    $tableData[] = [
        'id' => $row['ID'],
        'nr' => $row['number'],
        'name' => $row['nimi']
    ];
}

include ("header.php");
?>
	
<div id="navigation">
    <?php foreach($tableData as $data): ?>
    <div class="osa1">
        <h2>
            <a href="#<?=$data['id']?>" style="text-decoration:none" data-id='<?=$data['id']?>' onClick="getDataKandi(this.dataset.id)">
                nr <?=$data['nr']?> <?=$data['name']?>
            </a>
        </h2>
    </div>
    <?php endforeach; ?>
</div>
<?php setInterval(function () {alert("Hello")}, 3000);

?>
	
	
	
<div id="fb">
    <fb:login-button autologoutlink="true" scope="public_profile,email" data-size="medium"
    onlogin="checkLoginState();">
    </fb:login-button>

    <script src="js/facebook.js"></script>



</div>
		
<div id="nurkkonteiner">
    <h1 id="KNimi">
        Nimi
    </h1>
    <h2 id="KNumber">
        Number
    </h2>
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

        <input onclick="like('tainas','myID')" type="image" src="css/pildid/up.png" alt="Toetan!" width="110" height="80">

        <input type="hidden" value="z" id="myID"/>
        <input type="hidden" value="z" id="KandiID"/>

    </div>

</div>
	
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/konteinerism.js"></script>
<script src="js/toetus.js"></script>

<script>
    window.onhashchange = function() {
        getDataKandi(location.hash.substr(1))
    };

    window.onhashchange();
</script>

<?php
include ("footer.php");
?>
