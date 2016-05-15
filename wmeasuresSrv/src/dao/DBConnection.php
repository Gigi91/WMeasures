<?php

	/**
	 * Gestione della connessione al DB
	 * @author Luigi
	 *
	 */
	class DBConnection{
		private static $db = null;
		
		public static function getConnection(){
			
			if(!self::$db)
				self::$db = new mysqli('localhost', 'Luigi', 'password', 'WMeasures');
			
			if(mysqli_connect_error()) {
				trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
						E_USER_ERROR);
			}
			
			return self::$db ;
		}
	}

?>