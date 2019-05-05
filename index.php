<?php
	require 'included_contents/model.php';
	setlocale(LC_TIME, "fr"); // Passe l’heure locale en zone FR
	session_start();
	if (isset($_GET['from'])) {
		$from = $_GET['from'];
	}else {
		$from = "";
	}

	if (isset($_GET['action']))
	{
		$action = strip_tags($_GET['action']);
		try {
			switch($action) {

				case 'showcreateshop':
					if (isset($_SESSION['name'])) {
						$pageTitle = "Mabel - create my shop";
						$pageDescription = "Contruction rapide et facile de votre boutique Mabel.";
						require('vues/vueCreateShop.php');
					}else {
						$pageTitle = "Mabel - Connexion";
						$pageDescription = "Connection au compte Mabel";
						$from="showcreateshop";
						require('vues/vueConnexion.php');
					}
				break;

				case 'showexploreshops':
					$pageTitle = "Mabel - Explore";
					$pageDescription = "Explorez les boutiques ou rechercher un produit";
					require('vues/vueExploreShops.php');
					break;

				case 'showcreateaccount':
					$pageTitle = "Mabel - Créer mon compte";
					$pageDescription = "Créez votre compte Mabel en 30s";
					require('vues/vueCreateAccount.php');
				break;

				case 'tryconnecting':
					if (adduser($_POST['name'], $_POST['firstname'], $_POST['mail'], $_POST['password'], $_POST['password2'])) {
						$pageTitle = "Mabel - Succés création de compte";
						$pageDescription = "page de succés de la création de compte";
						require('vues/vueConfirmAccount.php');
					}else {
						echo "erreur dans l'ajout du compte";
					}
				break;

				case 'showconnexion':
					$pageTitle = "Mabel - Connexion";
					$pageDescription = "Connection au compte Mabel";
					require('vues/vueConnexion.php');
				break;

				default :
			 		throw new Exception("cet argument ne correspond a rien");
			 	break;
			}

		}catch(Exception $e){
			$msgErreur = $e->getMessage();
			$pageTitle = "Mabel - Erreur";
			$pageDescription = "la page d'erreur";
		 	require ('vues/vueErreur.php');
			echo $action;
		}
	}else {
		 $pageTitle = "Mabel - Acceuil";
		 $pageDescription = "Explorez des milliers de boutiques en ligne et créez la votres en quelques clics.";
		 require('vues/vueAccueil.php');
	 }

	 include 'included_contents/included_scripts.php';
	?>
