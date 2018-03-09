<?php
session_start();

	if(isset($_POST['submit'])){
		require 'db.php';

		$_SESSION["nom"] = $_POST['nom'];
		$_SESSION["prenom"] = $_POST["prenom"];
		$_SESSION["address"] = $_POST["address"];
		$_SESSION["city"] = $_POST["city"];
		$_SESSION["zip"] = $_POST["zip"];
		$_SESSION["telephone"] = $_POST["telephone"];
		
		
		
		// putting them on variables to work easy on query
		
		$nom = $_POST['nom'];
		$prenom = $_POST["prenom"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$zip = $_POST["zip"];
		$telephone = $_POST["telephone"];
		$id = $_SESSION["id"];
		
	
		$query = "update users set nom='$nom',prenom='$prenom',address='$address',city='$city',zip='$zip',telephone='$telephone' where id='$id' ";
	
		if(mysqli_query($connection, $query)){

		echo '<div class="alert alert-success">
		<strong>Success!</strong> Your profil has been updated !
		</div>';

	} else{

		echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);

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
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
				<a href="userarea.php" class="label label-default" > User Area </a>
				&nbsp;
				<a href="logout.php" class="label label-default"  > Log out </a>
		</div>
			
	</div>

</div>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a id="menu-toggle" href="#" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			</a>
				<div id="nav-placeholder">
					  <!-- Modal My address -->
						  <div class="modal fade" id="Address" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">My address</h4>
								</div>
								<div class="modal-body">
								<form class="form" name ="darnoo" id="darnoo" method="POST"  action="userarea.php" enctype="application/x-www-form-urlencoded">
									  <div class="form-group">
										<label for="Email">Email : </label>
										<input type="text" class="form-control" name="email" id="em" value="<?php echo($_SESSION['email']); ?>" disabled>
									  </div>
									  
									  <div class="form-group">
										<label for="Nom">Nom : </label>
										<input type="text" class="form-control" size="5" name="nom" id="nom" value="<?php echo($_SESSION['nom']); ?>">
									  </div>
									  
									  <div class="form-group">
										<label for="Prenom">Prenom : </label>
										<input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo($_SESSION['prenom']); ?>">
									  </div>
									  
									  <div class="form-group">
										<label for="Prenom">Address : </label>
										 <input type="text" class="form-control" name="address" id="adresse" value="<?php echo($_SESSION['address']); ?>">
									  </div>
									  
									  <div class="form-group">
										<label for="City">City : </label>
										 <input type="text" class="form-control" name="city" id="ville" value="<?php echo($_SESSION['city']); ?>">
									  </div>
									  
									  <div class="form-group">
										<label for="Zip">Zip : </label>
										 <input type="text" class="form-control" name="zip" id="ville" value="<?php echo($_SESSION['zip']); ?>">
									  </div>
									  
									  <div class="form-group">
										<label for="Telephone">Telephone : </label>
										 <input type="text" class="form-control" name="telephone" id="ville" value="<?php echo($_SESSION['telephone']); ?>">
									  </div>
									  
									  

								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  <input class="btn btn-success" type="submit" value="Submit" name="submit">
								</div>
							  </div>
							  </form>
							</div>
						  </div>
					 <!-- Modal My History -->
						  <div class="modal fade" id="History" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Modal Header</h4>
								</div>
								<div class="modal-body">
								  <p>Some text in the modal.</p>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
						  </div>
				</div>
		</div>
		<div id="sidebar-wrapper" class="sidebar-toggle">
			<ul class="sidebar-nav">
				<li>
		      		<a href="home.php" >HOME</a>
		    	</li>
		    	<li>
		      		<a href="#Address" data-toggle="modal" data-target="#Address">MY ADDRESS</a>
		    	</li>
		    	<li>
		      		<a href="#History" data-toggle="modal" data-target="#History">ORDER HISTORY</a>
		    	</li>
		    	<li>
		      		<a href="logout.php">LOGOUT</a>
		    	</li>
		  	</ul>
		</div>
  	</div>
</nav>

<script>
$(window).resize(function() {
	var path = $(this);
	var contW = path.width();
	if(contW >= 751){
		document.getElementsByClassName("sidebar-toggle")[0].style.left="200px";
	}else{
		document.getElementsByClassName("sidebar-toggle")[0].style.left="-200px";
	}
});
$(document).ready(function() {
	$('.dropdown').on('show.bs.dropdown', function(e){
	    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
	});
	$('.dropdown').on('hide.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
	});
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		var elem = document.getElementById("sidebar-wrapper");
		left = window.getComputedStyle(elem,null).getPropertyValue("left");
		if(left == "200px"){
			document.getElementsByClassName("sidebar-toggle")[0].style.left="-200px";
		}
		else if(left == "-200px"){
			document.getElementsByClassName("sidebar-toggle")[0].style.left="200px";
		}
	});
});
</script>

</body>
<html>