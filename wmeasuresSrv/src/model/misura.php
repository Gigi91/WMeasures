<?php

	class Misura{
		public $idsensore;
		public $username;
		public $date;
		public $time;
		public $value;
		public $luogo;
		
		public function aggiornaMisura(){
			$misuraDAO = new MisuraDao();
			return $misuraDAO->aggiornaMisura($this);
		}
		
		
	}
?>