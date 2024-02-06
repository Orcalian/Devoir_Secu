<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Ma page avec un canvas plein écran</title>
  <link href="main.css" rel="stylesheet">
</head>
<body>
	<div id="container">
	<div id="logo"><img src="./icone/7.jpg" alt=""></div>
	<?php
	//session_destroy();
	session_start();
	
	if(empty($_SESSION['logged']))
	{
		include ('champs.php');

	}
	else 
	{
		if(!empty($_SESSION['logged'])) 
		{
			echo "Bonjour ". htmlspecialchars($_SESSION['identifiant']) ."";
			var_dump(!empty($_SESSION['mmessage']));
			//include ('deconnect.php');
			include ('deconnect.php');
		}
	}
	
	if(isset($_SESSION['mmessage']) & !empty($_SESSION['mmessage']))
	{	  
		 echo " <script>alert('".htmlspecialchars($_SESSION['mmessage'])."');</script>"; 
	}
	
	?>
 	</div>
</body>

