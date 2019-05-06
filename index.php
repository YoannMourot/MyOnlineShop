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
						require('vues/vueCreateShop.php');
					}else {
						$from="showcreateshop";
						require('vues/vueConnexion.php');
					}
				break;

				case 'showexploreshops':
					require('vues/vueExploreShops.php');
				break;

				case 'showcreateaccount':
					require('vues/vueCreateAccount.php');
				break;

				case 'createaccount':
					if (isset($_POST['name'])) {
						if (adduser($_POST['name'], $_POST['firstname'], $_POST['mail'], $_POST['password'], $_POST['password2'])) {
							require('vues/vueConfirmAccount.php');
						}
					}else{
						require('vues/vueCreateAccount.php');
					}

				break;

				case 'connection':
					if (isset($_POST['mail'])) {
						if (connect($_POST['mail'], $_POST['password'])) {
							switch ($from) {
								case 'showcreateshop':
									require('vues/vueCreateShop.php');
									break;

								default:
									require('vues/vueAccueil.php');
									break;
							}
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'showconnexion':
					require('vues/vueConnexion.php');
				break;

				default :
			 		throw new Exception("cet argument ne correspond a rien");
			 	break;
			}

		}catch(Exception $e){
			$errormsg = $e->getMessage();
			switch ($action) {
				case 'connection':
					require('vues/vueConnexion.php');
				break;

				case 'createaccount':
					require('vues/vueCreateAccount.php');
				break;

				default:
					require ('vues/vueErreur.php');
				break;
			}
		}
	}else {
		 require('vues/vueAccueil.php');
	 }

	 include 'included_contents/included_scripts.php';
	?>
