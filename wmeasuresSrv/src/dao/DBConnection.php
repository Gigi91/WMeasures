<?php

	/**
	 * Gestione della connessione al DB
	 * @author Luigi
	 *
	 */
	class DBConnection{
		static private  $db = null;
		static private  $username = 'Luigi';
		static private  $password = 'password';
		static private  $dbname = 'WMeasures';
		static private  $dbserver = 'localhost';
		
		
		public static function getConnection(){
			
			if(!self::$db)
				self::$db = new mysqli(self::$dbserver, self::$username, self::$password, self::$dbname);
				
			if(mysqli_connect_error()) {
				trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
						E_USER_ERROR);
			}
			
			return self::$db ;
		}
	}

?>