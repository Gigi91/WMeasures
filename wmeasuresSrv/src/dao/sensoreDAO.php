<?php
	require 'DBConnection.php';
	
	class SensoreDao{
		
		//aggiunge il sensore al database
		public function addSensor($sensore, $username){
			$db = DBConnection::getConnection();
					
			$query = "INSERT INTO Sensore(Descrizione) VALUES ('" . $sensore->getDescrizione() .'")';
			if(!$result = $db->query($query)){
				die('There was an error running the query [' . $db->error . ']');
				return false;
			}else{
				$query = "SELECT ID FROM Sensore WHERE Descrizione = '".$sensore->getDescrizione() ."'";
				$result = $db->query($query);
				$row = $result->fetch_assoc();
				$id = $row['id'];
				$query = "INSERT INTO sensoreutente(IDSensore, IDUtente, DescSensore) VALUES ('" . $id. "','".$username."','". $sensore->getDescrizione() .'")';
				if(!$result = $db->query($query)){
					die('There was an error running the query [' . $db->error . ']');
				return false;
				}else{
					return false;
				}
				
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
					$id = $row['IDSensore'];
					array_push($list, new Sensore($id,$desc));
				}
					
				return $list;
			}else{
				return false;
			}
		
		
		}
	}