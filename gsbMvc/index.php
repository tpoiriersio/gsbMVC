<?php
session_start();
if(!isset($_SESSION['idcart']))
{
	$_SESSION['cart'] = array();
	$_SESSION['idcart'] = array();
}

if(!isset($_SESSION['montantArticle']))
{
	$_SESSION['montantArticle'] = 0;
}

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Chargement des fichiers MVC
require("control/controler.php");
require("view/view_accueil.php");
require("model/medicament.php");
require("model/consommateur.php");
require("model/commande.php");
require("model/point_de_vente.php");
require("model/fournir.php");

// Routes
if(isset($_GET["action"])) {
	switch($_GET["action"]) {
		case "inscription":
			(new controler)->inscription();
			break;
		case "panier":
			(new controler)->panier();
			break;
		case "pointDeVente":
			(new controler)->pointDeVente();
			break;			
		case "seConnecter":
			(new controler)->seConnecter();
			break; 	
		case "menu":
			(new controler)->menu();
			break;				
		case "article":
			(new controler)->article();
			break;	
		case "accueil":
			(new controler)->accueil();
			break;
		case "profil":
			(new controler)->profil();
			break;
		case "seDeconnecter":
			(new controler)->seDeconnecter();
			break;
		case "finalisationCommande":
			(new controler)->finalisationCommande();
			break;								 							
		
		// Route par défaut : erreur 404
		default:
			(new view)->erreur404();
			break;
	}
}
else {
	// Pas d'action précisée = afficher l'accueil
	(new controler)->accueil();
}