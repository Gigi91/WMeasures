<?php
	require "../dao/sensoreDAO.php";

	class Sensore{
		public $descr;
		
		public function __construct($desc){
			$this->descr = $desc;
		}
		
		public function getDescrizione(){
			return $this->descr;
		}
		
		public function setDescrizione($descr){
			$this->descr = $descr;
		}
		
		public function nuovoSensore($username){
			$sensoreDao = new SensoreDao();
			return $sensoreDao->addSensor($this, $username);
		}
		
		public function listaSensoriUtente($username){
			$sensoreDao = new SensoreDao();
			$senslist = $sensoreDao->getUserSensorList($username);
			$data = array("sensorList"=>$senslist);
			echo json_encode($data);
		}
		
	}