 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="JavaScript">
    	
    	$(document).ready(function() {
	        window.history.pushState(null, "", window.location.href);        
	        window.onpopstate = function() {
	            window.history.pushState(null, "", window.location.href);
	        };
	    });

    </script>
