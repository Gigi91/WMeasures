<?php
	include '../model/sensore.php';
	
	$username = $_POST['u'];
	$sensore = new Sensore("","");
	$sensore->listaSensoriUtente($username);
?>