<!DOCTYPE html>
<html>
<head>
	<title>Google Map</title>
	<style type="text/css">
	  	.map_canvas {
		    width:400px; 
		    height:200px;
		    background-color: #e5e3df;
		    margin-top:20px;
		}
		body { padding: 20px; }
	</style>
</head>
<body>

	<input type="text" id="geocomplete" placeholder="Enter the Location" name="location" required onblur="setMyMap(this.value)" >
  	<div class="map_canvas" id="map_canvas">
  	<script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&libraries=places&callback=initMap"
    async defer></script>

        <script>
        	function initMap() {
			    //autocomplete general for find ride
			    var map = new google.maps.Map(1);
			    var geocomplete = (document.getElementById('geocomplete'));
			    var autocomplete = new google.maps.places.Autocomplete(geocomplete);        
			}
			function setMyMap(address){
				var geocoder = new google.maps.Geocoder();
			    //var address = "new york";
			    geocoder.geocode( { 'address': address}, function(results, status) {
			    	if (status == google.maps.GeocoderStatus.OK) {
			    		var latitude = results[0].geometry.location.lat();
			    		var longitude = results[0].geometry.location.lng();
					    //alert(latitude);
					    var myLatlng = new google.maps.LatLng(latitude, longitude);
					    gMap = new google.maps.Map(document.getElementById('map_canvas')); 
					    gMap.setZoom(13);      // This will trigger a zoom_changed on the map
					    gMap.setCenter(myLatlng);
					    gMap.setMapTypeId(google.maps.MapTypeId.ROADMAP)
					    var marker = new google.maps.Marker({
					    	position: myLatlng,
					    	title:"My Location"
					    });
					    marker.setMap(gMap);
					} 
				}); 
			}

		    // get current location

		    jQuery(function($){
		    	var lat = $('#latt');
		    	var lng = $('#longi');
		    	$('#getMyLocation').click(function(){
		    		jQuery.ajax({
		    			url: '<?= base_url('home/get_current_address') ?>',
		    			type: 'post',
		    			data: 'lat=' + lat.val() + '&lng='+lng.val(),
		    			success: function(results){

		    				$("#geocomplete").val(results);
		    				var myLatlng = new google.maps.LatLng(lat.val(), lng.val());
		    				gMap = new google.maps.Map(document.getElementById('map_canvas')); 
						    gMap.setZoom(13);      // This will trigger a zoom_changed on the map
						    gMap.setCenter(myLatlng);
						    gMap.setMapTypeId(google.maps.MapTypeId.ROADMAP)
						    var marker = new google.maps.Marker({
						    	position: myLatlng,
						    	title:"My Location"
						    });
						    marker.setMap(gMap);
						}
					})
    			});
    			
	    	if(!navigator.geolocation){
	    		alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
	    	}
	    	navigator.geolocation.getCurrentPosition(success, error);
	    	function success(position){
	    		var latitude  = position.coords.latitude;	
	    		var longitude = position.coords.longitude;	
	    		var accuracy  = position.coords.accuracy;
	    		document.getElementById("latt").value  = latitude;
	    		document.getElementById("longi").value  = longitude;
	    		document.getElementById("accur").value  = accuracy;
	    	}
	    	function error(err){
	    		alert('ERROR(' + err.code + '): ' + err.message);
	    	}
	    });
    </script>

</body>
</html>
