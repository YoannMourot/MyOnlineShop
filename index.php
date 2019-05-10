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
						adduser($_POST['name'], $_POST['firstname'], $_POST['mail'], $_POST['password'], $_POST['password2']);
						require('vues/vueConfirmAccount.php');
					}else{
						require('vues/vueCreateAccount.php');
					}
				break;

				case 'showforgotaccount':
					require('vues/vueForgotAccount.php');
				break;

				case 'sendpasswordtoken':
					if (isset($_POST['mail'])) {
						sendpasswordtoken($_POST['mail']);
						require('vues/vueConfirmMailpwSent.php');
					}else {
						require('vues/vueForgotAccount.php');
					}
				break;

				case 'showsetnewpw':
					checkaccounttoken($_GET['mail'], $_GET['token']);
					require('vues/vueChangePassword.php');
				break;

				case 'changepassword':
					if (checkaccounttoken($_POST['mail'], $_POST['token'])) {
						changepassword($_POST['mail'], $_POST['password'], $_POST['password2']);
						require('vues/vueConfirmpwChanged.php');
					}else {
						require('vues/vueForgotAccount.php');
					}
				break;

				case 'connection':
					if (isset($_POST['mail'])) {
						connect($_POST['mail'], $_POST['password']);
						redirect($from);
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
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'showmyshops':
					if (isset($_SESSION['id'])) {
						require('vues/vueMyshops.php');
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'showmyorders':
					if (isset($_SESSION['id'])) {
						require('vues/vueMyorders.php');
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changename':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['name'])) {
							changename($_SESSION['mail'], $_POST['name']);
							$changeok = "prénom";	$_SESSION['name'] = $_POST['name'];
							require('vues/vueMyaccount.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changefirstname':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['firstname'])) {
							changefirstname($_SESSION['mail'], $_POST['firstname']);
							$changeok = "prénom";	$_SESSION['firstname'] = $_POST['firstname'];
							require('vues/vueMyaccount.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changepw':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['password'])) {
							changepassword($_SESSION['mail'], $_POST['password'], $_POST['password2']);
							$changeok = "photo de profil";
							require('vues/vueMyaccount.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changemail':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['mail'])) {
							changemail($_SESSION['mail'], $_POST['mail']);
							$changeok = "mail";
							require('vues/vueMyaccount.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeprofilepic':
					if (isset($_SESSION['id'])) {
						if (!empty ($_FILES['profilepic'])) {
							changepp($_SESSION['mail'], $_FILES['profilepic']);
							$changeok = "photo de profil";
							require('vues/vueMyaccount.php');
						}else {
							echo "string";
						}
					}else {
						require('vues/vueConnexion.php');
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

				case 'changename': case 'changefirstname': case 'changemail': case 'changepw': case 'changeprofilepic':
					require('vues/vueMyaccount.php');
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
