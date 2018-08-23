<!DOCTYPE html>
<html>
<head>
	<title>Code Demo for Java Script & JQuery</title>
</head>
<body>
<input type="text" onkeydown="javascript: if(event.keyCode == 13) { post_comment(118) }" >

<script>
	// check box true or false in JS
	if(document.getElementById('ID').checked == true) {
		console.log('true');
	} else {
		console.log('false');
	}

	// check box true or false in JQuery
	if($("#ID").is(':checked')){
		console.log('true');
	} else {
		console.log('false');
	}

	// document get ready
	$( document ).ready(function() {
		console.log( "document loaded" );
	});

	// onload function
	$( window ).on( "load", function() {
		console.log( "window loaded" );
	});
</script>
</body>
</html>
