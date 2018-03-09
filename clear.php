<?php

session_start();

unset($_SESSION['idbought']);

	if(isset($_SESSION["email"]))
		{
			header('Location: home.php');
		}
	else
		{
			header('Location: index.php');
		}
?>