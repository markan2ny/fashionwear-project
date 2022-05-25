<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php 
	include_once('../core/function.php');
$init = new manageFunction;

	$getID = $_GET['receiver_id'];
	$getMessage = $init->getSpecific(array($getID), "SELECT * FROM inbox WHERE receiver_id = ? AND status = 0");

	$d = $init->getSpecific(array($getID),"SELECT * FROM users WHERE user_id = ?");
	// var_dump($d);

 ?>


<div class="container">

	
	
</div>




<?php include_once('includes/footer.php'); ?>