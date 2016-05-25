<?php

	include "../dao/misuraDAO.php";
	
	class Misura{
		public $descSensore;
		public $username;
		public $date;
		public $time;
		public $value;
		public $luogo;
		
		public function aggiornaMisura(){
			$misuraDAO = new MisuraDao();
			return $misuraDAO->aggiornaMisura($this);
		}
		
		public function ottieniMisure($username, $start, $end, $sensori){
			$misuraDAO = new MisuraDao();
			return $misuraDAO->ottieniMisure($username, $start, $end, $sensori);
		}
		
	}
?>