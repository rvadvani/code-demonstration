<!DOCTYPE html>
<html>
<head>
	<title>Type</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<br>
	<div class="row">
		<div class="offset-4 col-md-4">
			<input type="text" id="name" class="form-control typeahead" data-provide="typeahead" autocomplete="off">
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap3-typeahead.js"></script>
	<script type="text/javascript">
		$.get("https://raw.githubusercontent.com/nshntarora/Indian-Cities-JSON/master/cities-name-list.json", function(data){
		  $("#name").typeahead({ source:data });
		},'json');
	</script>
</body>
</html>
