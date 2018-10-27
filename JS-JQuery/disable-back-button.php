 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script language="JavaScript">
    	
    	$(document).ready(function() {
	        window.history.pushState(null, "", window.location.href);        
	        window.onpopstate = function() {
	            window.history.pushState(null, "", window.location.href);
	        };
	    });

    </script>


  <script language="JavaScript">
    	
    	window.location.hash="no-back-button";
		window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
		window.onhashchange=function(){window.location.hash="no-back-button";}

    </script>
