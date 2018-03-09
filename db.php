<?php
	$connection=mysqli_connect("localhost","root","","ecommerce");

	if (!$connection){
		die('Erreur de connexion : ' . mysqli_connect_errno());
   }
	
?>