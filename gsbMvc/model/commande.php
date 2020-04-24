	<?php

class commande
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

	public function getCommande() 
	{	
		if(isset($_COOKIE['panier']))
		{
			$sql = "SELECT * FROM medicament where idMed in (".$_COOKIE['panier'].");";
			$req = $this->pdo->prepare($sql);
			$req->execute();
			return $req->fetchAll();	
		}
	}

	public function setCommande($idPointDeVente, $idConsommateur) 
	{
		$sql = "insert into `commande` (`date`, `heure`, `idPointDeVente`, `idConsommateur`) VALUES ('".date("Y-m-d")."','".date("H:i:s")."','".$idPointDeVente."','".$idConsommateur."')";
		$req = $this->pdo->prepare($sql);
		$req->execute();
		$_SESSION['idCommande'] = $this->pdo->lastInsertId();
	}
}
?>