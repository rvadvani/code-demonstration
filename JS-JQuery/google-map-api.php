<!DOCTYPE html>
<html>
<head>
	<title>Google Map</title>
	<style type="text/css">
	    .map_canvas {
	      width:600px; 
	      height:300px;
	      background-color: #e5e3df;
	      margin-top: 20px;
	    }
	    body{
	    	padding: 20px;
	    }
	    .class {
	    	padding: 4px;
	    }
	</style>
</head>
<body>

	<input type="text" id="setMyLocation" class="class" placeholder="Enter location" onblur="setMyMap(this.value)">
	<button class="class" onclick="getMyLocation()">get location</button>
	<div class="map_canvas" id="map_canvas"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&libraries=places&callback=initMap" async defer></script>

    <script type="text/javascript">
	  	function initMap() {
	        //autocomplete general for find ride
	        var map = new google.maps.Map(1);
	        var geocomplete = (document.getElementById('setMyLocation'));
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

		
       	function getMyLocation(){
        	if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else {
		    	alert('Not supported');
		    }
		}

	  	 function showPosition(position) {
		    var lat = position.coords.latitude;
		    var lng = position.coords.longitude;

	        var geocoder = new google.maps.Geocoder();
	        var latlng = new google.maps.LatLng(lat, lng);
		    geocoder.geocode({'latLng': latlng}, function(results, status) {
			  	if (status == google.maps.GeocoderStatus.OK) {
				  	console.log(results);
				    if (results[1]) {
				  		$("#setMyLocation").val(results[0].formatted_address);
				     	//alert(results[0].formatted_address);
					}
			    }
		    });
	        var myLatlng = new google.maps.LatLng(lat, lng);
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
    </script>
   <!-- Drag & Drop coded by efood -->
   <script type="text/javascript">
      function initialize() {
         var latt = document.getElementById("latt").value;
         var longi = document.getElementById("longi").value;
          var myLatlng = new google.maps.LatLng(latt, longi);
          var myOptions = {
            zoom: 13,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }

          var map = new google.maps.Map(document.getElementById("map_wrapp"), myOptions); 

          addMarker(myLatlng, 'Default Marker', map);

          map.addListener('click',function(event) {
              addMarker(event.latLng, 'Click Generated Marker', map);
          });
      }

      function handleEvent(event) {
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({
                   'latLng': event.latLng
               }, function (results, status) {
                   if (status ==
                       google.maps.GeocoderStatus.OK) {
                       if (results[0]) {
                           $("#geocomplete").val(results[0].formatted_address);
                       } else {
                           console.log('No results found');
                       }
                   } else {
                       console.log('Geocoder failed due to: ' + status);
                   }
               });
          document.getElementById('latt').value = event.latLng.lat();
          document.getElementById('longi').value = event.latLng.lng();
          $("#geocomplete").trigger("geocode");
      }

      function addMarker(latlng,title,map) {
          var marker = new google.maps.Marker({
                  position: latlng,
                  map: map,
                  title: title,
                  draggable:true
          });

          marker.addListener('drag', handleEvent);
          marker.addListener('dragend', handleEvent);
      }
      $(window).on('load', function(){
         initialize();
      });
   </script>
   <!-- Coded by efood -->
</body>
</html>
