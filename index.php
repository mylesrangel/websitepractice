<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<title>Insert very good title here</title>

	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font: sans-serif;
		}
		#logo_area{
			float: left;
			font-size: 29px;
			margin-top: 0px;
			margin-left: 0px;
			padding: 20px;
			border-right: 1px solid grey;
		}
		#header {
			background-color: lightgrey;
			height: 76px;
		}
		#display_buttons{
			width: 335px;
			height: 54px;
			margin: 0 auto;
			padding: 10px;
		}
		.toggle_buttons{
			float: left;
			font-size: 22px;
			padding: 6px;
			margin-top: 12px;
			border: 1px solid grey;
		}
		#html_button{
			border-top-left-radius: 5px;
			border-bottom-left-radius: 5px;
		}
		#output_button{
			border-top-right-radius: 5px;
			border-bottom-right-radius: 5px;
		}
		.active{
			background-color: lightblue;

		}
		.highlight_button{
			background-color: darkgrey;
		}
		textarea{
			resize: none;
			float:left;
			border-left: 1px solid grey; 

		}
		.section{

			float: left;
		}
		iframe{
			border-left: none;
			border-top: none;
		}
		.hidden{
			display: none;
		}




	</style>

</head>

<body>
	<div id="header">
		<div id="logo_area">
			Website Practice
		</div>
		<div id="display_buttons">
			<div class= "toggle_buttons active" id="html">HTML</div>
			<div class= "toggle_buttons " id="css">CSS</div>
			<div class= "toggle_buttons " id="javascript">JavaScript</div>
			<div class= "toggle_buttons active" id="output">Output</div>
			
		</div>
	</div>
	<div id="container">
		<div>
			<textarea class="section" id="html_text"> <p id = "htmlInput"> Use my id in javascript!!</p></textarea>
		</div>
 		<div>
			<textarea class="section hidden" id="css_text"> p{ color: blue; }</textarea>
		</div>
		<div>
			<textarea class="section hidden" id="javascript_text"> </textarea>
		</div>
		<div >
			<iframe  class="section" id="Output_text"> !</iframe>
		</div>
	</div>


	<script>
		$(document).ready(function(){

			function applyChanges(){

				$("iframe").contents().find("html").html("<html><head><style type ='text/css'>" + $("#css_text").val() +"</style></head><body>" + $("#html_text").val() + "</body> </html>");

				document.getElementById("Output_text").contentWindow.eval($("#javascript_text").val());
			}

			$(".toggle_buttons").hover(function(){
				$(this).addClass("highlight_button");
			},function(){
				$(this).removeClass("highlight_button");
			});

			$(".toggle_buttons").click(function(){
				$(this).toggleClass("active");

				//find button that was clicked
				var button_clicked = ($(this).attr("id") + "_text");
				//function hides/shows element that was clicked
				//I added "_text" to the end of the button clicked to retrive the text field and toggle it
				$("#" + button_clicked).toggle();

				//get number of elements that have id "active"

				var active_length = $(".active").length;
				$(".section").width(($(window).width() / active_length) -5);



			});

			$(".section").height($(window).height() - $("#header").height() - 10);

			$(".section").width(($(window).width() / 2) -5);

			$("iframe").contents().find("html").html($("#html_text").val());		

			applyChanges();

			$("textarea").on('change keyup paste', function(){

				applyChanges();
			});
		});
	</script>
</body>

</html>