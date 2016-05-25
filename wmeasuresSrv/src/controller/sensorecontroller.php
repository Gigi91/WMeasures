<?php
	include '../model/sensore.php';
	
	$username = $_POST['u'];
	$op = $_POST['op'];
	
	if($op == "get"){
		$sensore = new Sensore("");
		$sensore->listaSensoriUtente($username);
	}else if($op=="add"){
		$descr = $_POST["descr"];
		$sensore = new Sensore($descr);
		if(!$sensore->nuovoSensore($username))
			die("Impossibile aggiungere il sensore");
	}
?>