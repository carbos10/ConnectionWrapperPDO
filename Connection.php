<?php 

define("DB_HOST", "");
define("DB_USER", ""); 
define("DB_PASS", ""); 
define("DB_DATA", "");

class Connection extends PDO{
		public function __construct($host = DB_HOST , $data = DB_DATA , $user = DB_USER , $pass = DB_PASS){
			try {
				parent::__construct("mysql:host=$host;dbname=$data;" , $user , $pass);
			} catch(PDOException $e){
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		public function query($query , array $valori = [] ){
			try {
				$res = parent::prepare($query);
				if($res === false ){
					throw new \PDOException("#01");
				}
				if($res->execute($valori) === false ){
					throw new \PDOException("#02");
				}
				return $res ; 
			} catch(PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}	
		}
	}
?>
