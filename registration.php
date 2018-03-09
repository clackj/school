<?php


	if(isset($_POST['submit'])){
	require 'db.php';

	$email = $_POST['email'];
	$mdp = $_POST['mdp'];
	$civile = $_POST['civile'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$telephone = $_POST['telephone'];
	
	//DODGE SQL INJECTION
	
	$email = mysqli_real_escape_string($connection,$email);
	$mdp = mysqli_real_escape_string($connection,$mdp);
	$civile = mysqli_real_escape_string($connection,$civile);
	$nom = mysqli_real_escape_string($connection,$nom);
	$prenom = mysqli_real_escape_string($connection,$prenom);
	$adresse = mysqli_real_escape_string($connection,$adresse);
	$city = mysqli_real_escape_string($connection,$city);
	$zip = mysqli_real_escape_string($connection,$zip);
	$telephone = mysqli_real_escape_string($connection,$telephone);	
	
	
 	$sql = "INSERT INTO users (email,pwd,civile,nom,prenom,address,city,zip,telephone)VALUES ('$email','$mdp','$civile','$nom','$prenom','$adresse','$city','$zip','$telephone')";
	
	
		if(mysqli_query($connection, $sql)){

		echo '<div class="alert alert-success">
		<strong>Success!</strong> Signup a successful <a href="login.php" class="label label-success" > Click Here </a> &nbsp; to LogIn.
		</div>';

	} else{

		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);

	}

	// Close connection

	mysqli_close($connection);

	
}

?>

<html>
<head>
<title> Store Jordan </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="style.css">
<!-- 4 DATE TIME PICKER -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<!-- VALIDATOR CHAMPS -->
<script src="validator.js"></script>

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

</div>
<div class="signup">

	<form class="form" name ="darnoo" id="darnoo" method="POST"  action="registration.php" enctype="application/x-www-form-urlencoded">
				  <table border="0" cellspacing="0" width="560" class="signupform">
                    <tbody>
					 <tr>
                    <td >
					</td>
					 <td >
                        <h1> <span class="titleform">Sign up </span> </h1>
					</td>
                    </tr>
                    <tr>
                      <td width="163">
                        <label class="label label-default" >Email :</label></td>
                      <td>
                        <input name="email" size="29" class="form-control" type="text" required>
						<br>
					</td>
                    </tr>
                    <tr>
                      <td width="163">
                        <label class="label label-default">Mot de passe :</label></td>
                      <td>
                        <input name="mdp" size="14" class="form-control" type="password" required> <br></td>
                    </tr>
                    <tr>
                      <td width="163">
                        <label class="label label-default">Civilité :</label>
                      </td>
                      <td>
						<input name="civile" value="M" type="radio" required> M
						<input name="civile" value="MME" type="radio"> MME
						<input name="civile" value="MLLE" type="radio"> MLLE
						<br>
						<br>
                      	</td>
                    </tr>
                    <tr>
                      <td width="163">
                        <label class="label label-default">Nom :</label>
                      	</td>
                      <td>
                        <input name="nom" size="40" class="form-control" type="text" required>
						<br>
                      </td>
                    </tr>
                    <tr>
                      <td width="163">
                        <label class="label label-default">Prénom :</label>
                      	</td>
                      <td>
                        <input name="prenom" size="40" class="form-control" type="text" required>
						<br>
						</td>
                    </tr>
    

                    <tr>
                      <td width="163">
                        <label class="label label-default">Adresse :</label></td>
                      <td>
                        <input name="adresse" size="40" class="form-control" type="text" required>
						<br>
						</td>
                    </tr>
                                        <tr>
                      <td width="163">
                        <label class="label label-default">Ville :</label></td>
                      <td>
                        <input name="city" size="40" class="form-control" type="text" required>
						<br>
						</td>
                    </tr>
                    <tr>
                      <td width="163">
                        <label class="label label-default">Code postal :</label></td>
                      <td>
                        <input name="zip" size="5" maxlength="5" class="form-control" type="text" required>
						<br>
						</td>
                    </tr>
					    <tr>
                      <td width="163">
                        <label class="label label-default">Téléphone :</label></td>
                      <td>
                        <input name="telephone" size="15" id="numtele" maxlength="10" class="form-control" type="text" required>
						<br>
						</td>
                    </tr>

                    <tr>
                      <td width="163"></td>
                      <td>
					 <input class="btn btn-success" type="submit" value="Submit" name="submit">
					  </td>
                    </tr>
                  </tbody>
				  </table>
                </form>
				
				<script  type="text/javascript">
				var frmvalidator = new Validator("darnoo");
					frmvalidator.addValidation("email","email","Format de votre email est incorrect.");
					frmvalidator.addValidation("zip","num","Format de votre code postale est incorrect.");
					frmvalidator.addValidation("zip","minlen=5","Format de votre code postale est incorrect.");
					frmvalidator.addValidation("telephone","num","Format de votre téléphone est incorrect.");
					frmvalidator.addValidation("telephone","minlen=10","Format de votre téléphone est incorrect.");

</script>
</div>
</body>
<html>