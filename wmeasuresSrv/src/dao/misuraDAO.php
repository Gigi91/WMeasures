<?php

	require 'DBConnection.php';
	
	class MisuraDao{
		//aggiunge il sensore al database
		public function aggiornaMisura($misura){
			$db = DBConnection::getConnection();
				
			$query = "insert into Misura(IDSensore,IDUtente,data,ora,valore) values ('".$misura->idsensore."','".
					$misura->username."',DATA('".$misura->date."'),TIME('".$misura->time."'),'".$misura->value."','";
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
				return false;
			}
			return true;
		
		}
		
	}