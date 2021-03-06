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
		
			
			$query = "SELECT * FROM Utente WHERE username='".$db->real_escape_string($utente->getUsername())."'";
			$user = null;
		
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
			}
		
			if($result->num_rows){
				die(utf8_decode("Nome utente gi� in uso"));
			}else{
				$query = "INSERT INTO Utente(Nome, Cognome, Compagnia, username, password) VALUES ('" . $db->real_escape_string($utente->getNome()) . "','".$db->real_escape_string($utente->getCognome())."','".$db->real_escape_string($utente->getCompany())."', '".$db->real_escape_string($utente->getUsername())."','".$db->real_escape_string($utente->getPassword())."')";
				if(!$result = $db->query($query)){
					die('There was an error running the query [' . $db->error . ']');
				}else
					die("Utente aggiunto correttamente");
					//return true;
			}
		
		}
		
		//ottieni utente mediante nome utente e password
		public function getUser($username, $password){
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM Utente WHERE username='".$db->real_escape_string($username)."' AND password='".$db->real_escape_string($password)."'";
			$user = null;
		
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
			}
		
			if($result->num_rows){
				return true;
					
			}else{
				die("Nome utente o password errati");
			}
		
		
		}
		
	}
	
?>