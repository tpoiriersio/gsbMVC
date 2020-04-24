<?php

class fournir
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

	public function setFournir($id, $commande, $quantite) 
	{
		$sql = "insert into `fournir` (`idMed`,`idCommande`, `quantite`) VALUES ('".$id."','".$commande."','".$quantite."')";
		$req = $this->pdo->prepare($sql);
		$req->execute();
	}
}
?>