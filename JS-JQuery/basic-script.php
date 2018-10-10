<!DOCTYPE html>
<html>
<head>
	<title>JavaScript</title>
</head>
<body>
	<div>
		<button id="get">get</button>
		<button id="post">post</button>
		<button id="button">button</button>
		<div id="div1"></div>



	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){

		    $("button").click(function(){
		        $("p").hide(); // p tag selector
		        $("#test").hide(); // id selector
		         $(".test").hide(); // class selector
		    });
		    // on focus
		    $("input").focus(function(){
		        $(this).css("background-color", "#cccccc");
		    });
		    // on blur
		    $("input").blur(function(){
		        $(this).css("background-color", "#ffffff");
		    });
		    // on click
		    $("p").on("click", function(){
		        $(this).hide();
		    });

		    $("#flip").click(function(){
		        $("#panel").slideDown(); // slideDown, slideUp, slideToggle, fadeIn, fadeOut, fadeToggle
		    });

		});

		// callback function
		$("button").click(function(){
		    $("p").hide("slow", function(){
		        alert("The paragraph is now hidden");
		    });
		});

		// Get Content - text(), html(), and val()
		$("#btn1").click(function(){
		    alert("Text: " + $("#test").text());
		});
		$("#btn2").click(function(){
		    alert("HTML: " + $("#test").html());
		});

		// append
		$("p").append("Some appended text.");

		// remove & empty
		$("#div1").remove();
		$("#div1").empty();

		// remove p tag by classes
		$("p").remove(".test, .demo");

		// add classes
		$("h1, h2, p").addClass("blue");

		// remove classes
		$("h1, h2, p").removeClass("blue");

		// set css
		$("p").css("background-color", "yellow");

		// multiple css
		$("p").css({"background-color": "yellow", "font-size": "200%"});

		// Set Content - text(), html(), and val()
		$("#btn1").click(function(){
		    $("#test1").text("Hello world!");
		});
		$("#btn2").click(function(){
		    $("#test2").html("<b>Hello world!</b>");
		});
		$("#btn3").click(function(){
		    $("#test3").val("Dolly Duck");
		});


		$(document).ready(function(){
			$("#get").click(function(){
			    $.get("ajax.php?name=Ramesh", function(data, status){
			        console.log("Data: " + data + "\nStatus: " + status);
			    });
			});

			$("#post").click(function(){
			    $.post("ajax.php",
			    {
			        name: "Ramesh",
			        city: "Bengaluru"
			    },
			    function(data, status){
			        console.log("Data: " + data + "\nStatus: " + status);
			    });
			});

			$("#button").click(function(){
			    $("#div1").load("ajax.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")
			            console.log("External content loaded successfully!");
			        if(statusTxt == "error")
			            console.log("Error: " + xhr.status + ": " + xhr.statusText);
			    });
			});
		});
	</script>
</body>
</html>
