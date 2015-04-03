<?php
include ("header.php");
?>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
<script src="js/facebook.js"></script>

<div id="status">
</div>

</div>
<?php
include ("footer.php");
?>
