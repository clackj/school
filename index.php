<?php

session_start();

//checking if remember me == true
//checking if remember me == true
// function loogedin()
// {
  // if(isset($_SESSION['email']) || isset($_COOKIE['email']))
  // {
    // $loogedin=TRUE;
    // return $loogedin;
  // }
// }
// if(loogedin())
// {
  // header("Location: home.php" );
  // exit();
// }

?>

<html>
<head>
<title> Store Jordan </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="main">
	<div class="topbar">
	
		<img class="logo" src="images/logo.png">
		
			<div class="cart">
			<img src="images/cart.ico">
			<a href="checkout.php" class="label label-warning" >Checkout ! </a>
			<label id="countitem"> 				<?php
						if(isset($_SESSION["id"])) {
						echo count($_SESSION["id"]);
						} else {
						echo '0';}
				?> </label>	
		</div>
		<a href="clear.php" class="label label-primary" id="clearcart">Clear Cart </a>
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

		<div id="sidebar-wrapper" class="sidebar-toggle">
			<ul class="sidebar-nav">
		    	<li>
		      		<a href="home.php" data-toggle="modal" data-target="#Address">HOME</a>
		    	</li>
		    	<li>
		      		<a href="userarea.php" data-toggle="modal" data-target="#History">USER AREA</a>
		    	</li>
		    	<li>
		      		<a href="logout.php">Logout</a>
		    	</li>
		    	</li>
		  	</ul>
		</div>
		<?php
		
			require 'db.php';
			//get info product
			$query = "select * from product";
			$productinfo = mysqli_query($connection,$query);
			if (!$query)
			{
				die('Error: ' . mysqli_error($connection));
			}
			//get photo
			$query = "select photo from category";
			$photo = mysqli_query($connection,$query);
			if (!$query)
			{
				die('Error: ' . mysqli_error($connection));
			}
			

			while($row = mysqli_fetch_array($productinfo))
			{
				$photolink = mysqli_fetch_array($photo);
				echo '
			<div class="container main-section">
			  <div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12 product">
				  <div class="row product-part">
					<div class="col-md-12 col-sm-12 colxs-12 img-section">
					  <img src="'. $photolink["photo"] .'">
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 product-title">
					  <h1>'. $row["produit"] .'</h1>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 product-description">
					  <p>'. $row["description"] .' </p>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 product-cart">
					  <div class="row">
						<div class="col-md-6 col-sm-12 col-xs-6">
						  <p>'. $row["price"] .' $</p>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-6 text-right product-add-cart">
							<input id="price" name="price" type="hidden" data-price="'. $row["price"] .'" >
						  <input type="submit" value="ADD TO CART" class="btn btn-success" id="productid" data-value="'. $row["id"] .'" onclick="getID(this)">
						</div>
					  </div>
					</div>
				  </div>
				</div>
				';
			}
		?>
  </div>
</div>
 <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
 <script type="text/javascript">
function getID(that) {
	
	var id = $(that).attr("data-value");
	console.log(id);
	
            $.ajax({
                url: "stored_items.php",
                data: {
						 item_id:id,
						},
                type: "POST",
                success: function (data) {
					$('#countitem').html(data);
				  
                },
                error: function (data, status) {
                    $('#status').html(status);
                }
            })

	
}

</script>

</body>
<html>