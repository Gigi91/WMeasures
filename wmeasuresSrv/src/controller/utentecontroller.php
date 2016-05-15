<?php

	require '../model/utente.php';
	
	//$method = $_SERVER['REQUEST_METHOD'];
	$op = $_POST['op'];
	
	if($op == 'log'){
		//visualizza un utente	
		$username = $_POST['u'];
		$password = md5($_POST['p']);
		
		$user = new Utente("","","","","");
		if($user->getUser($username, $password))
			die("Login OK");
		else
			die("Login false");
		
	}else if($op=='reg'){
		//inserisci un utente
		$nome = $_POST['n'];
		$cognome = $_POST['c'];
		$company = $_POST['cp'];
		$username = $_POST['u'];
		
		$password = $_POST['p'];
		$rpass = $_POST['rp'];
		
		if($password != $rpass){
			return ;
		}
		
		$password = md5($password);
		
		$user = new Utente($nome, $cognome, $company, $username, $password);
		if($user->addUser())
			die("Reg OK");
		else
			die("Reg Fail");
	}

?>
	
