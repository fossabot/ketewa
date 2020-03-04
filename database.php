<?php 
/**
* 
*/
class Database
{
	private $dbHost = "localhost";

	private $dbName = "ketewadb";

	private $dbUser = "root";

	private $dbPass = "root";

	protected $pdo = false;

	function __construct(){
		try{
			$pdo = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}", $this->dbUser, $this->dbPass);
			$this->pdo = $pdo;
		}
		catch(PDOException $ex){

		}
	}

}