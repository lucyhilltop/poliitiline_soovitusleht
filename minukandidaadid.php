<?php
include ("header.php");
?>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<CENTER>
<fb:login-button scope="public_profile,email" data-size="xlarge" onlogin="checkLoginState();">
</fb:login-button>
<fb:logout-button>
</fb:logout-button>
</CENTER>
<script src="js/facebook.js"></script>

<div id="status">
</div>

</div>
<?php
include ("footer.php");
?>
