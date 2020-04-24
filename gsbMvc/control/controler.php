<?php
class controler {
	
	public function menu() 
	{
		(new view)->menu();
	} 	

	public function accueil() 
	{
		(new view)->accueil();
	}

	public function article()
	{
		$obj = (new medicament)->getAllMedicaments();
		(new view)->article($obj);
	}			

	public function inscription() 
	{
		if(isset($_POST["validerInscription"]))
		{
			(new consommateur)->setInscription($_POST["nom"],$_POST["prénom"],$_POST["mail"],$_POST["password"]);
			$this-> accueil();
		}
		else
		{
			(new view)->inscription();
		}
	}

	public function panier() 
	{
		if(isset($_POST["getPointDeVente"]))
		{
			if(isset($_SESSION["login"]))
			{
				header('Location: http://172.19.0.3/gsbMvc/index.php?action=pointDeVente');
				exit;				
			}
			else
			{
				header('Location: http://172.19.0.3/gsbMvc/index.php?action=seConnecter');
				exit;
			}
		}
		else
		{
			$obj = (new commande)->getCommande();
			(new view)->panier($obj);
		}
	}

	public function pointDeVente() 
	{
		if(isset($_POST["passerCommande"]))
		{

			(new commande)->setCommande($_POST["selectPDV"], $_SESSION["id"]);
			(new fournir)->setFournir($_SESSION['idcart'], $_SESSION['cart']);
			header('Location: http://172.19.0.3/gsbMvc/index.php?action=finalisationCommande');
			exit;
		}
		else
		{
			$obj = (new point_de_vente)->getPDV();
			(new view)->pointDeVente($obj);
		}

	}

	public function finalisationCommande()
	{
		if(isset($_COOKIE["panier"]))
		{	
			$quantite = array_count_values($_SESSION['tab']);
			$obj = (new commande)->getCommande();
			foreach ($obj as $larticle) 
			{
				(new fournir)->setFournir($larticle["idMed"], $_SESSION['idCommande'], $quantite[$larticle['idMed']]);
			}
		}
		(new view)->finalisationCommande();	
	}

	public function profil() 
	{
		if(isset($_POST["modifProfil"]))
		{
			$_SESSION["login"] = $_POST["adresseProfil"];
			(new consommateur)->setModifProfil($_POST["idProfil"],$_POST["nomProfil"],$_POST["prenomProfil"],$_POST["adresseProfil"]);
			$obj = (new consommateur )->getConsommateur();
			(new view)->profil($obj);
		}
		else
		{
			$obj = (new consommateur )->getConsommateur();
			(new view)->profil($obj);
		}
	}

	public function seConnecter()
	{
		if(isset($_POST["validerConnexion"]))
		{
			(new consommateur)->getConnexion($_POST["login"],$_POST["password"]);
			header('Location: http://172.19.0.3/gsbMvc/index.php?action=article');
			exit;
		}
		else
		{
			(new view)->seConnecter();
		}
	}

	public function seDeconnecter()
	{
		unset($_SESSION["login"]);
		unset($_SESSION["id"]);
		session_destroy();
		$this->seConnecter();
	}
}