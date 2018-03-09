<?php

session_start();

	if(isset($_POST['submit'])){
		if(isset($_SESSION["idbought"])) {
			header('Location: receipt.php');
		}
		else if (!isset($_SESSION["idbought"]))
		{
			echo '<div class="alert alert-danger">
				<strong>Danger!</strong> Your cart is empty , add some items.
				</div>';
			
		}
	}
?>

<html>
<head>
<title> Store Jordan </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="main">
	<div class="topbar">
	
		<a href="http://localhost/index.php" > 
		<img class="logo" src="images/logo.png">
		</a>
		
			<div class="cart">
			<img src="images/cart.ico">
			<a href="logout.php" class="label label-warning" >Checkout ! </a>
			<label >
				<?php
						if(isset($_SESSION["idbought"])) {
						echo count($_SESSION["idbought"]);
						} else {
						echo '0';}
				?>
		    <label>
		</div>
	<a href="logout.php" class="label label-primary" id="clearcart">Clear Cart </a>
	</div>
	
	<div class="social_icon">
	<div class="container">
		<div class="icon">
			<img src="images/image1.png">
			<img src="images/image2.png">
			<img src="images/image3.png">
		</div>
		<div class="registration">
			<a href="login.php" class="label label-info" > Bonjour <?php echo $_SESSION["nom"]; ?> </a>

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
		  	</ul>
		</div>

		<div class="container">
		<form class="form" name ="darnoo" id="darnoo" method="POST" enctype="application/x-www-form-urlencoded">
			<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
			<?php
						
						$pricetotal  = 0;
						foreach ($_SESSION['idbought'] as $result){
						
						require 'db.php';
						$id = $result;
						//get info product
						$query = "select * from product where id=$id";
						$productinfo = mysqli_query($connection,$query);
						if (!$query)
						{
							die('Error: ' . mysqli_error($connection));
						}
						//get photo
						$query = "select photo from category where id=$id";
						$photo = mysqli_query($connection,$query);
						if (!$query)
						{
							die('Error: ' . mysqli_error($connection));
						}
						$row = mysqli_fetch_array($productinfo);
						$photolink = mysqli_fetch_array($photo);
						$pricetotal += $row["price"];
					echo '<tbody>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="'. $photolink["photo"] .'" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">Product '. $row["produit"] .'</h4>
										<p>'. $row["description"] .' </p>
									</div>
								</div>
							</td>
							<td data-th="Price">$'. $row["price"] .'</td>
							<td data-th="Quantity">
							</td>							
							</td>
						</tr>
					</tbody>
					
					';
				}
					?>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"></td>
						</tr>
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total $<?php echo $pricetotal; ?></strong></td>
							<td>
						  <input class="btn btn-success" type="submit" value="Submit" name="submit">
							 <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>	
				</form>
				
		</div>
</div>


 <script type="text/javascript" src="jquery-3.3.1.min.js"></script>


</body>
<html>