<?php include ("header.php"); ?>

<div class="fb-center">

<fb:login-button autologoutlink="true" scope="public_profile,email" data-size="xlarge" onlogin="checkLoginState();">
</fb:login-button>

<script src="js/facebook.js"></script>

<div id="status">
</div>

</div>
<?php include ("footer.php"); ?>
