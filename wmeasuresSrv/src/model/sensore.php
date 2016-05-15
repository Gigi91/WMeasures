<?php
	require "../dao/sensoreDAO.php";

	class Sensore{
		public $ID;
		public $descr;
		
		public function __construct($id, $desc){
			$this->ID = $id;
			$this->descr = $desc;
		}
		
		public function getDescrizione(){
			return $this->descr;
		}
		
		public function setTipo($descr){
			$this->descr = $descr;
		}
		
		public function nuovoSensore($username){
			$sensoreDao = new SensoreDao();
			return $sensoreDao->addSensor($this, $username);
		}
		
		public function listaSensoriUtente($username){
			$sensoreDao = new SensoreDao();
			$senslist = $sensoreDao->getUserSensorList($username);
			
			echo json_encode($senslist);
		}
		
	}