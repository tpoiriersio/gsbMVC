<?php

class categorie
{
	private $pdo;

	public function __construct() 
	{
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"], $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getCategorie() {
		$sql = "SELECT * FROM categorie";
		$req = $this->pdo->prepare($sql);
		$req->execute();
		return $req->fetchAll();
	}
}
?>