<?php
session_start();

$_SESSION["idbought"][] = $_POST["item_id"];
if(isset($_SESSION["idbought"])) {
echo count($_SESSION["idbought"]);
} else {
echo '(0)';}

// if(isset($_SESSION["id"]))
  // {
	// echo count($_SESSION['id']);
	// exit();
  // }
		// require 'db.php';
		// $id = $_SESSION["id"];

		// $sql = "INSERT INTO test (id) VALUES ('$id')";
		// if(mysqli_query($connection, $sql)){

		// echo '<div class="alert alert-success">
		// <strong>Success!</strong> Signup a successful <a href="login.php" class="label label-success" > Click Here </a> &nbsp; to LogIn.
		// </div>';
		// } else{
		// echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
		// }

	// Close connection

	// mysqli_close($connection);

?>