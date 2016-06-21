<?php
	require 'DBConnection.php';
	
	class SensoreDao{
		
		//aggiunge il sensore al database
		public function addSensor($sensore, $username){
			$db = DBConnection::getConnection();
			//verifico se il sensore è già presente nel database
			$query = "SELECT * FROM Sensore WHERE UPPER(Descrizione) = UPPER('". $db->real_escape_string($sensore->getDescrizione()) . "')";
			
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
				return false;
			}else{
				if($result->num_rows==0){//il sensore non è presente e lo inseriamo nella lista sensori
					$query = "INSERT INTO Sensore(Descrizione) VALUES ('" . $db->real_escape_string($sensore->getDescrizione()) ."')";
						
					if(!$result = $db->query($query)){
						die('There was an error running the query [' . $db->error . ']');
						return false;
					}
				}
			}
			$query = "INSERT INTO sensoreutente(IDUtente, DescSensore) VALUES ('".$username."','". $db->real_escape_string($sensore->getDescrizione()) ."')";
			if(!$result = $db->query($query)){
			 	die('There was an error running the query [' . $db->error . ']');
			 	return false;
			}else{
				 //die("Sensore inserito correttamente");
				 die("Sensore OK");
			 	 return true;
			}
				
		
		
		}
		
		//ottieni utente mediante nome utente e password
		public function getUserSensorList($username){
			$db = DBConnection::getConnection();
			$query = "SELECT * FROM sensoreutente WHERE IDUtente ='".$username."'";
			$user = null;
			
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
			}
		
			if($result->num_rows){
				$list = array();
				while($row = $result->fetch_assoc()){
					$desc = $row['DescSensore'];
					array_push($list, new Sensore($desc));
				}
					
				return $list;
			}else{
				return false;
			}
		
		
		}
	}