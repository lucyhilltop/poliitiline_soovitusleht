<!DOCTYPE html>

<html>
	<head>
	<meta charset="utf-8">
		<title>PoliitilineSoovitus</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
		<style type="text/css"></style>
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
	</head>
<body>
<div id="header-wrapper">
	<div id="header">
	
	<div id="title">
        	<span class="icon icon-cog"></span>
			<h1><a href="index.php">Poliitiline Soovitusleht</a></h1>
	</div>
		
		
	<div id="menu-wrapper">
		<div id='menu'>
			<li><a href="index.php" class="button">Avaleht</a></li>
			<li><a href="soovitajad.php" class="button">Soovitajad</a></li>
			<li><a href="kandidaadid.php" class="button">Kandidaadid</a></li>
			<li><a href="lisakandidaat.php" class="button">Lisa kandidaat</a></li>
			<li><a href="minukandidaadid.php" class="button">Minu seaded</a></li>
			<li><a href="invite.php" class="button">Kutse</a></li>
		</div>
    </div>
	</div>
</div>
<div id ='konteinerX'>	

