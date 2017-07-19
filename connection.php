<?php 
	class Db{
		private static $instance = NULL;

		//We make these private, so no one else can call
		// and create new instances.
		private function __construct(){}

		private function __clone(){}

		public static function getInstance(){
			if(!isset(self::$instance)){
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

				//Change db info here.
				//@TODO load from config file.
				self::$instance = new PDO('mysql:host=localhost:3306; dbname=collab', 'root', 'root', $pdo_options);
			}
			return self::$instance;
		}
	}
 ?>