<?php

include ("funktsioonid/dbfun.php");

$conn = connect();
$sql = 'SELECT * FROM Soovitajad';
$stmt=sqlsrv_query($conn, $sql);

while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
    $tableData[$row['ID']] = $row['nimi'];
}

include("header.php");
?>
	
<div id="navigation">
    <?php foreach($tableData as $id => $name): ?>
    <div class="osa1">
        <h2>
            <a href="#<?=$id?>" style="text-decoration:none" data-id='<?=$id?>' onClick="getDataSoov(this.dataset.id)">
                <?=$name?>
            </a>
        </h2>
    </div>
<?php endforeach; ?>
</div>

<div id="fb">
    <fb:login-button autologoutlink="true" scope="public_profile,email" data-size="medium" onlogin="checkLoginState();">
    </fb:login-button>
</div>

<div id="nurkkonteiner">
    <h1 id="SNimi">Nimi</h1>
    <p id="SToetatud">Toetatud</p>
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/konteinerism.js"></script>

<script>

</script>

<script src="js/facebook.js"></script>
<?php include("footer.php"); ?>