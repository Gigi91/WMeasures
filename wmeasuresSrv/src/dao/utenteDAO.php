<?php

	require 'DBConnection.php';
	
	/**
	 * Classe DAO per la manipolazione del database utente
	 * @author Luigi
	 *
	 */
	class UtenteDAO{
		
		//aggiunge l'utente al database
		public function addUser($utente){
			$db = DBConnection::getConnection();
		
			$query = "SELECT * FROM Utente WHERE username='".$utente->getUsername()."'";
			$user = null;
		
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
			}
		
			if($result->num_rows){
				die("Utente gi� esistente");
			}else{
				$query = "INSERT INTO Utente(Nome, Cognome, Compagnia, username, password) VALUES ('" . $utente->getNome() . "','".$utente->getCognome()."','".$utente->getCompany()."', '".$utente->getUsername()."','".$utente->getPassword()."')";
				if(!$result = $db->query($query)){
					die('There was an error running the query [' . $db->error . ']');
				}else
					//die("utente aggiunto correttamente");
					return true;
			}
		
		}
		
		//ottieni utente mediante nome utente e password
		public function getUser($username, $password){
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM Utente WHERE username='$username' AND password='$password'";
			$user = null;
		
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
			}
		
			if($result->num_rows){
				return true;
					
			}else{
				return false;
			}
		
		
		}
		
	}
	
?>