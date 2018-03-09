<?php
session_start();

?>
<html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="container">
    <div class="row">



			// $pricetotal  = 0;
		// foreach ($_SESSION['idbought'] as $result){
		
		// require 'db.php';
		// $id = $result;
		// get info product
		// $query = "select * from product where id=$id";
		// $productinfo = mysqli_query($connection,$query);
		// if (!$query)
		// {
			// die('Error: ' . mysqli_error($connection));
		// }
		// get billing information
		// $query = "select photo from category where id=$id";
		// $photo = mysqli_query($connection,$query);
		// if (!$query)
		// {
			// die('Error: ' . mysqli_error($connection));
		// }
		// $row = mysqli_fetch_array($productinfo);
		// $photolink = mysqli_fetch_array($photo);
		// $pricetotal += $row["price"];
		// require 'db.php';
		// $sql = "INSERT INTO orders (orderid,pricetotal,buyerid,time)VALUES ('$email','$mdp','$civile','$nom','$prenom')";

	
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # 12345</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					John Smith<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					Jane Smith<br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa ending **** 4242<br>
    					jsmith@email.com
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					March 7, 2014<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
		// ?>
    </div>

	  <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Order summary</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td><strong>Item</strong></td>
										<td class="text-center"><strong>Price</strong></td>
										<td class="text-right"><strong>Totals</strong></td>
									</tr>
								</thead>
								<tbody>
									<!-- foreach ($order->lineItems as $line) or some such thing here -->
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
									$row = mysqli_fetch_array($productinfo);
									$pricetotal += $row["price"];
									echo'
									<tr>
										<td>'. $row["produit"] .'</td>
										<td class="text-center">$'. $row["price"] .'</td>
										<td class="text-right">$'. $row["price"] .'</td>
									</tr>
									';
}
?>
									<tr>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line text-center"><strong>Subtotal</strong></td>
										<td class="thick-line text-right">$<?php echo $pricetotal; ?></td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Shipping</strong></td>
										<td class="no-line text-right">$15</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Total</strong></td>
										<td class="no-line text-right"> $ <?php $pricetotal += 15; echo $pricetotal; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</body>
<html>