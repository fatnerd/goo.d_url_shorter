<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Goo.d_URL_SHORTNER</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script type="text/javascript">
		function myFunction() {
		  /* Get the text field */
		  var copyText = document.getElementById("url_copied");

		  /* Select the text field */
		  copyText.select();

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  alert("Copied the text: " + copyText.value);
		}
	</script>
	
</head>
<body>
	<div class="bg">
		<div class="container">
			<h1 class="title">Goo.d Short Url</h1>
			
			<form action="shorten.php" method="post">
				<input type="url" name="url" placeholder="Enter a url" autocomplete="off">
				<input type="submit" name="shorten" >
			</form>
			<div id = "url_copied">
			<?php
				if(isset($_SESSION['feedback'])){
					echo "<p>{$_SESSION['feedback']}</p>";
					unset($_SESSION['feedback']);
				}
			?>	
			</div>
						
			<!-- The button used to copy the text -->
			<button onclick="myFunction()" onmouseout="outFunc()">Copy text</button>
		</div>
		
	</div>
</body>
</html>