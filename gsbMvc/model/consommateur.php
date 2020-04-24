<?php

class consommateur 
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
	
	public function setInscription($nom,$prenom,$mail,$password) 
	{
		$sql = "insert into `consommateur` (`Nom`, `Prenom`, `AdresseMail`, `password`) VALUES ('".$nom."','".$prenom."','".$mail."','".password_hash($password, PASSWORD_DEFAULT)."')";
		$req = $this->pdo->prepare($sql);
		$req->execute();
	}

	public function setModifProfil($id,$nom,$prenom,$mail)
	{
		$sql = "UPDATE `consommateur` SET Nom = '".$nom."', Prenom = '".$prenom."', AdresseMail = '".$mail."' WHERE idConsommateur = '".$id."'";
		$req = $this->pdo->prepare($sql);
		$req->execute();
	}

	public function getConnexion($login, $password) {

		$sql = "select * FROM `consommateur` WHERE `AdresseMail`= '".$_POST["login"]."'";
		$req = $this->pdo->prepare($sql);
		$req->execute();
		$data = $req->fetch();
		if($req->execute())
		{
			if(password_verify($_POST["password"], $data["password"]) == true)
			{
				$_SESSION["login"] = $_POST["login"];
				$_SESSION["id"] = $data["idConsommateur"];
				echo "Vous êtes maintenant connecté !";
			}
			else
			{
				echo "Impossible de vous connecter, vous n'êtes pas inscris sur notre forum, inscrivez vous dès maintenant.";
			}
		}
		else
		{
			echo "Impossible de vous connecter, vous n'êtes pas inscris sur notre forum, inscrivez vous dès maintenant.";
		}	
	}

	public function getConsommateur() 
	{	
		$sql = "select * FROM `consommateur` WHERE `AdresseMail`= '".$_SESSION["login"]."'";
		$req = $this->pdo->prepare($sql);
		$req->execute();
		return $req->fetchAll();
	}		
}
?>