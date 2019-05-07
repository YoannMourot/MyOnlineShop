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
					if (isset($_SESSION['id'])) {
						require('vues/vueCreateShop.php');
					}else {
						$from=$_GET['action'];
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

				case 'showforgotaccount':
					require('vues/vueForgotAccount.php');
				break;

				case 'sendpasswordtoken':
					if (isset($_POST['mail'])) {
						if (sendpasswordtoken($_POST['mail'])) {
							redirect($from);
						}
					}else {
						require('vues/vueForgotAccount.php');
					}
				break;

				case 'confirmpwchangeprocess':
					require('vues/vuePwchangeProcess.php');
				break;

				case 'connection':
					if (isset($_POST['mail'])) {
						if (connect($_POST['mail'], $_POST['password'])) {
							redirect($from);
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'showconnexion':
					require('vues/vueConnexion.php');
				break;

				case 'disconnect':
					disconnect();
					redirect($from);
				break;

				case 'showmyaccount':
					if (isset($_SESSION['id'])) {
						require('vues/vueMyaccount.php');
					}
				break;

				case 'showmyshops':
					if (isset($_SESSION['id'])) {
						require('vues/vueMyshops.php');
					}
				break;

				case 'showmyorders':
					if (isset($_SESSION['id'])) {
						require('vues/vueMyorders.php');
					}
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

				case 'sendpasswordtoken':
					require('vues/vueForgotAccount.php');
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
