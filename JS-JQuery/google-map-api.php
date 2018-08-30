<!DOCTYPE html>
<html>
<head>
	<title>Code Demo for Google Map API</title>
</head>
<body>

<input type="text" name="location" id="location" >

<script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=API_KEY"></script>
<script type="text/javascript">
	function initialize() {
	  var input = document.getElementById('location');
	  new google.maps.places.Autocomplete(input);
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>
