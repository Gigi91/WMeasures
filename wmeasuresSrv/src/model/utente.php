<?php
	
	require "../dao/utenteDAO.php";
	
	/**
	 * Classe Utente
	 */
	class Utente{
		private $nome = "";
		private $cognome = "";
		private $company = "";
		private $username = "";
		private $password = "";
		
		public function __construct($nome, $cognome, $company, $username, $password){
			
			$this->nome = $nome;
			$this->cognome = $cognome;
			$this->company = $company;
			$this->username = $username;
			$this->password = $password;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getCognome(){
			return $this->cognome;
		}
		
		public function getCompany(){
			return $this->company;
		}
		
		public function getUsername(){
			return $this->username;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function setCognome($cognome){
			$this->cognome = $cognome;
		}
		
		public function setCompany($company){
			$this->company = $company;
		}
		
		public function setUsername($username){
			$this->username = $username;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
		
		public function addUser(){
			$utenteDao = new UtenteDAO();
			return $utenteDao->addUser($this);
		}
		
		public function getUser($username, $password){
			$utenteDao = new UtenteDAO();
			return $utenteDao->getUser($username, $password);
		}
		
	}

?>
