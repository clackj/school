<?php
session_start();

if(isset($_POST['submit'])){
	
	require 'db.php';
		
	$email = mysqli_real_escape_string($connection,$_POST["email"]);
	$password = mysqli_real_escape_string($connection,$_POST["password"]);
	
	$query = "SELECT * FROM users WHERE email = '$email' and pwd='$password'";
	$result = mysqli_query($connection,$query);

    if (!$query)
    {
        die('Error: ' . mysqli_error($connection));
    }
	$count = mysqli_num_rows($result);
		if($count > 0){
			
		$row = mysqli_fetch_assoc($result);
		$_SESSION["id"] = $row["id"];
		$_SESSION["email"] = $row["email"];
		$_SESSION["civile"] = $row["civile"];
		$_SESSION["nom"] = $row["nom"];
		$_SESSION["prenom"] = $row["prenom"];
		$_SESSION["address"] = $row["address"];
		$_SESSION["city"] = $row["city"];
		$_SESSION["zip"] = $row["zip"];
		$_SESSION["telephone"] = $row["telephone"];
		
		//saving checkbox into variable
		
		if(isset($_POST['rememberme'])){
			setcookie("email", $email, time()+7200);
		}


		echo '<div class="alert alert-success">
		Hi <b>'.$_SESSION["nom"].' </b>! you will be redirected in few seconds.
		</div>
		<meta http-equiv="refresh" content="2; url=home.php" />';
	}else{

		echo '<div class="label label-warning">
		Username or password are incorrect.
		</div>';

	}
	
}

?>

<html>
<head>
<title> Store Jordan </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
	<div class="topbar">
	
		<img class="logo" src="images/logo.png">
		
			<div class="cart">
			<img src="images/cart.ico">
			<label > Cart (0) <label>
				
		</div>
	
	</div>
	
	<div class="social_icon">

	<div class="container">
		<div class="icon">
			<img src="images/image1.png">
			<img src="images/image2.png">
			<img src="images/image3.png">
		</div>
		<div class="registration">
				<a href="login.php" class="label label-default" >Login </a>
				&nbsp;
				<a href="registration.php" class="label label-default"  >Register </a>
		</div>
			
	</div>
	<form class="form" name ="darnoo" id="darnoo" method="POST"  action="login.php" enctype="application/x-www-form-urlencoded">
	 <table border="0" cellspacing="0" width="560" class="signupform">
	 <tbody>
	<tr>
       <td> </td>
       <td>
		<h1> <span class="titleform"> Log In </span> </h1>
	</td>
	</tr>
	<tr>
	 	<td width="163">
               <label class="label label-default" >Email :</label>
		</td>
		<td>
		  <div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input id="email" type="text" size="40" class="form-control" name="email" placeholder="Email">
		  </div>
		  <br>
		</td>
	</tr>
	<tr>
	     <td width="163">
         <label class="label label-default" >Password :</label></td>
		<td>
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input id="password" type="password" size="40" class="form-control" name="password" placeholder="Password">
			</div>
			<br>
		</td>
	</tr>
	<tr>
       <td width="163"> </td>
       <td>
		<input class="btn btn-success" type="submit" value="Submit" name="submit">
	</td>
	</tr>
	</tr>
	<td></td>
	<td> <input type="checkbox" name="rememberme" id="rememberme" value="1"> 
	<label> Remember me  </label>
	</td>
	</tr>
</form>

</div>
</body>
<html>