	<?php
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="script/panier.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">';
echo "<link rel='stylesheet' href='style/style.css'>";

class view 
{

	public function menu() 
	{

		echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a style="color: green;" class="navbar-brand" href="http://172.19.0.3/gsbMvc/index.php"><span class="glyphicon glyphicon-home"></span>	Accueil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">';
			if(!isset($_SESSION["login"]))
			{
				echo '<a style="color: green;" class="nav-link" href="index.php?action=inscription"><span class="glyphicon glyphicon-pencil">	Inscription<span class="sr-only">(current)</span></a>
			</li>';
			}

			echo '<li class="nav-item">';
			if(!isset($_SESSION["login"]))
			{
				echo '<a style="color: green;" class="nav-link" href="index.php?action=seConnecter"><span class="glyphicon glyphicon-off"></span>	Connexion</a>';
			}
			else
			{
				echo '<a style="color: green;" class="nav-link" href="index.php?action=seDeconnecter" name="unsetSession"><span class="glyphicon glyphicon-off"></span>	Se déconnecter</a>';
			}

			echo '</li>
			<li class="nav-item">
				<a style="color: green;" class="nav-link" href="index.php?action=article"><span class="glyphicon glyphicon-tags"></span>	Articles</a>
			</li>
			<li class="nav-item">';
			
			$monPanier = "";
			if(isset($_COOKIE["panier"])) 
			{
				$monPanier = $_COOKIE["panier"];
			}

			if(isset($_POST["addCart"]))
			{
				if(isset($_COOKIE["panier"])) 
				{
					$monPanier .= ",";
				}

				for($i = 0; $i < $_POST["addQuantity"]; $i++) 
				{
					$monPanier .= $_POST["addCart"].",";
				}

				$monPanier = substr($monPanier, 0, -1);
				setcookie("panier", $monPanier);
			}

			if($monPanier != "")
			{
				$_SESSION['tab'] = explode(",",$monPanier);
				echo '<a style="color: green;" class="nav-link" href="index.php?action=panier">
		    <span class="glyphicon glyphicon-shopping-cart" id="compteur">'.count($_SESSION['tab']).'</span>	Panier</a>';	
			}
			else 
			{
				echo '<a style="color: green;" class="nav-link" href="index.php?action=panier">
		 	<span class="glyphicon glyphicon-shopping-cart" id="compteur">0</span>	Panier</a>';
			}
	
			echo '</li>
			<li class="nav-item">';

			if(isset($_SESSION["login"]))
			{
				echo '<a class="nav-link" style="color: green;" href="index.php?action=profil"><span class="glyphicon glyphicon-user"></span>Profil</a>';
			}
			echo'
			</li>
			</ul>
		</div>
		</nav>';
	}

	public function accueil()
	{
		$this->menu();

		echo "<div id='contenu'>";
		echo "<h1>VOTRE PHARMACIE EN LIGNE 100% FRANÇAISE</h1>";
		echo "<p>Besoin d’un médicament disponible sans ordonnance ou d’un produit vendu en parapharmacie ? Commandez-le sur Pharmashopi, la première pharmacie en ligne agréée. Vous trouverez sur notre site tous les soins pour traiter différents problèmes de santé comme un état grippal, des maux d’estomac, des douleurs articulaires, de l’herpès, des mycoses intimes, etc.</p> <p> Plus de 300 marques de soins de parapharmacie et de nombreux médicaments disponibles sans ordonnance sont présents sur notre site. Retrouvez vos produits phares et vos marques préférées comme Anaca3, Avène, Caudalie, Nuxe, Bioderma, Vichy, La Roche-Posay, Klorane, Somatoline, etc.
		Pharmashopi est une vraie pharmacie en ligne, idéale pour les adeptes de l’automédication et pour ceux qui ne peuvent pas se déplacer ou n’en ont pas le temps tout simplement. Nous avons à votre disposition des médicaments pouvant être vendus sans ordonnances. Mal de tête ? Problème de digestion ? Fièvre passagère ? Commandez en ligne vos boites de Doliprane, Gaviscon ou encore Smecta. Un doute sur un médicament ? N’hésitez pas à nous appeler pour bénéficier de l’expertise de nos pharmaciens. Ils vous conseilleront et vous indiqueront quels sont les produits les plus adaptés à votre état et à vos besoins. Ils vous apporteront une information claire et précise.</p> <br/>
		Bénéficiez d’offres spéciales et de remises toute l’année. Chaque semaine, nous mettons en avant une marque de parapharmacie et proposons des réductions importantes sur toute la gamme. Et dès 65€ d’achat, la livraison à domicile vous est offerte en France !</p><br/>";
		echo "<h1>Nos marques:</h1>";
		echo "<a href='https://www.sante-verte.com/fr/'><img src='\gsbMvc\image\accueil\Santé-Verte.jpg' style='height: 200px;' width: 200px;' alt='...' class='imgMarque'></a>";
		echo "<a href='https://www.sanoflore.fr/?gclid=EAIaIQobChMIgKnC7Mme5QIVCVXTCh09lQEBEAAYASAAEgKEL_D_BwE'><img src='\gsbMvc\image\accueil\LOGO_SANOFLORE.png' style='height: 200px;' width: 200px;'alt='...' class='imgMarque'></a>";
		echo "<a href='https://www.vichy.fr/?gclid=EAIaIQobChMI77nzgcqe5QIVSEPTCh1E8AFOEAAYASAAEgLaGPD_BwE'><img src='\gsbMvc\image\accueil\logovichy.png' style='height: 200px;' width: 200px;'alt='...' class='imgMarque'></a>";
		echo "<a href='https://www.eucerin.fr/'><img src='\gsbMvc\image\accueil\Eucerin_logo.png' style='height: 200px;' width: 200px;'alt='...' class='imgMarque'></a><br/>";
		echo "<h1>POURQUOI ACHETER SES MÉDICAMENTS SUR INTERNET ?</h1>";
		echo "<p>Il est tout à fait normal d’avoir quelques craintes d’acheter ses médicaments sur internet. Il s’agit de produits avec des principes actifs qui agissent directement sur notre corps. Il faut donc être certain de la provenance des médicaments pour ne pas acheter des contrefaçons.</p>
		<p>Pharmashopi.com est la première pharmacie en ligne agréée par l’Agence Régionale de Santé Rhône Alpes pour la vente de médicaments en ligne. Son autorisation date de 2013. Vous retrouverez donc plus de 1500 références de médicaments (Spasfon, Smecta, Euphytose, Gaviscon, Ibuprofène...), 5000 références homéopathiques sans ordonnance et plus de 10000 produits de parapharmacie. Déclarée auprès de l’Ordre National des Pharmaciens, Pharmashopi.com lutte ainsi contre la contrefaçon de médicaments sur internet. Tous les médicaments hors ordonnances disponibles sur votre pharmacie en ligne Pharmashopi sont issus du circuit légal français.</p>
		<p>Attention ! N’achetez pas vos médicaments sur n’importe quel site ! Pharmashopi est un site qui a reçu tous les agréments nécessaires. Vérifiez toujours ce point avant de commander des médicaments sur internet. Certains sites illégaux n’hésitent pas à proposer des produits interdits ou d’origine douteuse. Ne mettez pas votre santé en jeu et quittez immédiatement ce genre de site. Privilégiez une pharmacie française en ligne qui respecte l’obligation de fournir aux internautes des liens vers les sites du Conseil National de l’Ordre des Pharmaciens et de l’Agence Régional de Santé afin de pouvoir s’assurer de la légalité du site de vente de médicaments en ligne. Vous les trouverez tout en bas de notre site.</p>
		<p>Vous hésitez encore ? Contactez-nous, nos pharmaciens et l’équipe officinale se tiennent à votre disposition pour vous conseiller et vous informer. En savoir plus sur la vente de médicaments en ligne.</p><br/>";
		echo "</div>";
	}

	public function article($data)
	{
		$this->menu();

		echo "<div class='containerAll'>

      	<h1 class='my-4'>Liste des médicaments disponibles</h1>";
  		if(isset($_POST["addCart"]))
		{
			array_push($_SESSION['cart'],$_POST["addQuantity"]);
			array_push($_SESSION['idcart'],$_POST["addCart"]);
		}
     	
		foreach($data as $uneDonnee) 
		{
			echo "<div class='row'>
	        <div class='col-md-7'>
	        <a href='#''>";
			echo "<form method='POST' name='formCart'>";	
	        echo "<img class='imageProduit' src='../gsbMvc/image/produits/".$uneDonnee["imageProduit"]."'>
	        </a>
		    </div>
		        <div class='col-md-5'>
		        <h3>".$uneDonnee["nomMed"]." - ".$uneDonnee["prixMed"]." EUROS</h3>
		        <p>".$uneDonnee["descriptionProduit"]."</p>
		        <input type='number' name='addQuantity' min='1' max='100'>
		        <button type='submit' name='addCart' value='".$uneDonnee['idMed']."'/>Acheter</button></form>
		        </div>
	     	</div>

	      <hr>";
		}
		echo "</div>";
	}

	public function inscription() 
	{
		$this->menu();
		
		echo '<body class="text-center">
		<form name="linscription" method="post" class="form-signin">
		<img class="mb-4" src="\gsbMvc\image\accueil\images.png" alt="" width="90" height="90">
		<h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
		<label for="inputEmail" class="sr-only">Votre nom:</label>
		<input type="text" id="inputEmail" class="form-control" name="nom" placeholder="nom" required autofocus>
		<label for="inputPassword" class="sr-only">Votre prénom:</label>
		<input type="text" id="inputPassword" name="prénom" class="form-control" placeholder="prenom" required>
		<label for="inputPassword" class="sr-only">Votre adresse email:</label>
		<input type="email" id="inputPassword" name="mail" class="form-control" placeholder="email" required>
		<label for="inputPassword" class="sr-only">Votre mot de passe:</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="mot de passe" required>
		<div class="checkbox mb-3">
			<label>
			<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="validerInscription">Inscription</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
		</form>
		</body>';
	}

	public function panier($data) 
	{
		$this->menu();

    	echo "
    	<div class='containerAll'>
    	<h1 class='my-4'>Gestion du panier</h1>

      	<h1 class='my-4'>Liste des produits de votre panier</h1>";
      	if(isset($_SESSION["tab"]))
      	{
      		$quantite = array_count_values($_SESSION['tab']);
      	}
      	else
      	{
      		echo "Le panier est vide, passez à la boutique dès maintenant.";
      	}

     	$totalPanier= 0;
     	if(isset($_COOKIE["panier"]))
		{	
			foreach($data as $uneDonnee) 
			{
				$totalPanier += ($quantite[$uneDonnee['idMed']] * $uneDonnee['prixMed']);
			    echo "<hr>";
				echo "<div class='row'>
		        <div class='col-md-7'>
				<a href='#''></a>";	
				
				echo "<img class='imageProduitPanier' src='../gsbMvc/image/produits/".$uneDonnee['imageProduit']."'<div class='titreMedic'><b>".$uneDonnee['nomMed']."</div><br><div class='prixMedic'>EUR ".$uneDonnee['prixMed']."</div></b><div class='descriptionMedic'>".$uneDonnee['descriptionProduit']."</div><br/><br>";
				echo "<div class='quantitePanier' >Quantité:<input type='number' name='quantity' min='1' max='100' value='".$quantite[$uneDonnee['idMed']]."'></div>";
				echo "<div class='boutonSupprimer'><input type='submit' name='supprimerProduit' value='Supprimer'></div>";
				echo "<hr>";
				echo "</div>";	
			}
		}

		echo "</div>";
		echo "<div class='recapitulatif'><br><b>Récapitulatif:  </b><br><br>
			 <b><div class='prixT'>EUR ".$totalPanier."</div></b><br>
			 <form method='post'>
			 <button type='submit' class='btn btn-success' name='getPointDeVente'>Passer commande</button></form></div><br><br>";
	}

	public function pointDeVente($data)
	{
		$this->menu();
		echo "<div class='containerAll'>

		<iframe width='100%' height='300px' frameborder='0' allowfullscreen src='http://umap.openstreetmap.fr/fr/map/officines-gsb_384277?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false'></iframe><p><a href='http://umap.openstreetmap.fr/fr/map/officines-gsb_384277'>Voir en plein écran</a></p>

		<form method='post'>
		<select class='form-control form-control-lg' name='selectPDV'>";
		foreach($data as $uneDonnee)
		{
			echo "<option name='idPointDeVente' value='".$uneDonnee["idPointDeVente"]."'>".$uneDonnee["nom"]."</option>";
		}
		echo "</select>
		
		<button type='submit' class='btn btn-success' name='passerCommande'>Valider la commande</button></form>
		</div>";
	}
	
	public function finalisationCommande()
	{
		$this->menu();
		echo "<div class='containerAll'>
		
		
		</div>";
	}

	public function seConnecter()
	{
		$this->menu();

		echo '<body class="text-center">
		<form class="form-signin" method="post" action="">
		<img class="mb-4" src="\gsbMvc\image\accueil\images.png" alt="" width="90" height="90">
		<h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>
		<label for="inputEmail" class="sr-only">Adresse Email!</label>
		<input type="email" id="inputEmail" class="form-control" name="login" placeholder="adresse email" required autofocus>
		<label for="inputPassword" class="sr-only">Mot de passe!</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="mot de passe" required>
		<div class="checkbox mb-3">
		<label>
		<input type="checkbox" value="remember-me"> Se souvenir de moi
		</label>
		</div>
		<button class="btn btn-lg btn-success btn-block" type="submit" name="validerConnexion">Se connecter</button>
		<button class="btn btn-lg btn-danger btn-block" type="reset">Annuler</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
		</form>
		</body>';

	}

	public function profil($data)
	{
		$this->menu();
		echo '<div class="container">
		<div class="row"> 
        <div class="col-md-7 ">

		<div class="panel panel-default">
  		<div class="panel-heading" style="background-color: green; color: white;">
  		<h4 >Profil utilisateur</h4>
  		</div>
  		<div class="panel-body">
       
    	<div class="box box-info">
        
        <div class="box-body">
        <div class="col-sm-6">
        <div  align="center"><img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                
        <input id="profile-image-upload" class="hidden" type="file">
		<div style="color:#999;" >Cliquez ici pour changer votre image</div>

        </div>
           
        <br>
        </div>
        <div class="col-sm-6">';
        foreach ($data as $uneDonnee)
        {
        	echo "<h4 style='color: green;'>".$uneDonnee['Nom'].' '.$uneDonnee['Prenom']."</h4></span>";
        

        echo'
        <span><p>Utilisateur</p></span>            
        </div>
        <div class="clearfix"></div>
        <hr style="margin:5px 0 5px 0;">
         
        <form method="post" action="">
        <input type="hidden" name="idProfil" value="'.$uneDonnee['idConsommateur'].'"</input>
		<div class="col-sm-5 col-xs-6 tital " >Nom : </div><div class="col-sm-7 col-xs-6 "><input type="text" class="form-control" name="nomProfil" value="'.$uneDonnee['Nom'].'"</input></div>
		<div class="clearfix"></div>
		<div class="bot-border"></div>

		<div class="col-sm-5 col-xs-6 tital " >Prénom : </div><div class="col-sm-7"><input type="text" class="form-control" name="prenomProfil" value="'.$uneDonnee['Prenom'].'"</input></div>
		 <div class="clearfix"></div>
		<div class="bot-border"></div>

		<div class="col-sm-5 col-xs-6 tital " >Adresse email : </div><div class="col-sm-7"><input type="text" class="form-control" name="adresseProfil" value="'.$uneDonnee['AdresseMail'].'"</input></div>
		<div class="clearfix"></div>
		<div class="bot-border"></div>

		<button type="submit" class="btn btn-success" name="modifProfil"><span class="glyphicon glyphicon-list-alt"></span> Modifier</button>
		</form>

		<!-- /.box-body -->
		</div>
		<!-- /.box -->
		</div> 
		</div> 
		</div>
		</div>  
		</div>
		</div>';
		}
	}

	public function erreur404()
	{
		echo "<p>404 : Not Found</p>";
	}

}

echo "<script type='text/javascript'>ChargerCompteur()</script>";
?>