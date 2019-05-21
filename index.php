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
						$shops = getshops($_SESSION['id']);
						require('vues/vueMyshops.php');
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
					if (checkaccounttoken($_GET['mail'], $_GET['token'])) {
						require('vues/vueChangePassword.php');
					}else {
						throw new Exception("L'adresse de réinitialisation du mot de passe a surement déja été utilisée");
					}
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
						$shops = getshops($_SESSION['id']);
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
							changename($_SESSION['mail'], strip_tags($_POST['name']));
							$successmsg = "Nom changé";
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
							$successmsg = "prénom changé";
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
							$successmsg = "mot de passe changé";
							require('vues/vueMyaccount.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'sendmailtoken':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['mail'])) {
							changemail($_POST['mail']);
							require('vues/vueWaitforCode.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'setnewmail':
					if (isset($_SESSION['id']) && isset($_SESSION['tmpmail'])) {
						if (isset($_POST['token'])) {
							if (checkaccounttoken($_SESSION['mail'], $_POST['token'])) {
								setnewmail($_SESSION['mail'], $_SESSION['tmpmail']);
								$successmsg = "Votre adresse mail a bien été changée";
								require('vues/vueMyaccount.php');
							}else {
								throw new Exception("le code est incorrect");
							}
						}else{
							require('vues/vueWaitforCode.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeprofilepic':
					if (isset($_SESSION['id'])) {
						if (!empty ($_FILES['profilepic']['name'])) {
							changepp($_SESSION['mail'], $_FILES['profilepic']);
							$successmsg = "photo de profil changée";
							require('vues/vueMyaccount.php');
						}else {
							throw new Exception("vous devez uploader une image");
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'createshop':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['shopname'])) {
							addshop($_POST['shopname']);
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case  'closeshop':
					if (isset($_SESSION['id'])) {
						if (isset($_GET['shopid'])) {
							closeshop($_GET['shopid']);
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeshoppicture':
					if (isset($_SESSION['id'])){
						if (!empty($_FILES['shoppicture']['name']) && isset($_GET['id'])) {
							changeshoppicture("shoplogo", $_GET['id'], $_FILES['shoppicture']);
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}else {
							throw new Exception("vous devez uploader une image");
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'editshop':
					if (isset($_SESSION['id'])){
						if (belongtouser($_GET['shopid'], $_SESSION['id'])) {
							$shop = getshop($_GET['shopid']);
							$categories = getshopcategories($_GET['shopid']);
							$items = getshopitems($_GET['shopid']);
							require('vues/vueEditshop.php');
						}else {
							$shop = getshop($_GET['shopid']);
							$categories = getshopcategories($_GET['shopid']);
							$items = getshopitems($_GET['shopid']);
							require('vues/vueEditshop.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'addsection':
					if (isset($_SESSION['id'])){
						if (belongtouser($_GET['shopid'], $_SESSION['id'])) {
							addsection($_GET['shopid'], $_GET['section']);
							$shop = getshop($_GET['shopid']);
							$categories = getshopcategories($_GET['shopid']);
							$items = getshopitems($_GET['shopid']);
							require('vues/vueEditshop.php');
						}else {
							$shop = getshop($_GET['shopid']);
							$categories = getshopcategories($_GET['shopid']);
							$items = getshopitems($_GET['shopid']);
							require('vues/vueEditshop.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'removesection':
					if (isset($_SESSION['id'])){
						if (belongtouser($_GET['shopid'], $_SESSION['id'])) {
							removesection($_GET['shopid'], $_GET['section']);
							$shop = getshop($_GET['shopid']);
							$categories = getshopcategories($_GET['shopid']);
							$items = getshopitems($_GET['shopid']);
							require('vues/vueEditshop.php');
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'additem':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['itemname']) && isset($_POST['categoryid'])) {
							if (belongtouser($_GET['shopid'], $_SESSION['id'])) {
								additem($_GET['shopid'], $_POST['itemname'], $_POST['categoryid']);
								$shop = getshop($_GET['shopid']);
								$categories = getshopcategories($_GET['shopid']);
								$items = getshopitems($_GET['shopid']);
								require('vues/vueEditshop.php');
							}
						}else {
							$shop = getshop($_GET['shopid']);
							$categories = getshopcategories($_GET['shopid']);
							$items = getshopitems($_GET['shopid']);
							require('vues/vueEditshop.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'addcategory':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['categoryname'])) {
							if (belongtouser($_GET['shopid'], $_SESSION['id'])) {
								addcategory($_GET['shopid'], $_POST['categoryname']);
								$shop = getshop($_GET['shopid']);
								$categories = getshopcategories($_GET['shopid']);
								$items = getshopitems($_GET['shopid']);
								require('vues/vueEditshop.php');
							}
						}else {
							$shop = getshop($_GET['shopid']);
							$categories = getshopcategories($_GET['shopid']);
							$items = getshopitems($_GET['shopid']);
							require('vues/vueEditshop.php');
						}
					}else{
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

				case 'changepassword':
					require('vues/vueChangePassword.php');
				break;

				case 'setnewmail':
						require('vues/vueWaitforCode.php');
				break;

				case 'changename': case 'changefirstname': case 'sendmailtoken': case 'changepw': case 'changeprofilepic':
					require('vues/vueMyaccount.php');
				break;

				case 'createshop':
					$shops = getshops($_SESSION['id']);
					$createshoperror = $errormsg;
					require('vues/vueMyshops.php');
				break;

				case 'changeshoppicture':
				$shops = getshops($_SESSION['id']);
				$changeshoppictureerror = $errormsg;
				require('vues/vueMyshops.php');
				break;

				case 'additem':
					$shop = getshop($_GET['shopid']);
					$categories = getshopcategories($_GET['shopid']);
					$items = getshopitems($_GET['shopid']);
					$additemerror = $errormsg;
					$itemadding = $_POST['categoryid'];
					require('vues/vueEditshop.php');
				break;

				case 'addcategory':
					$shop = getshop($_GET['shopid']);
					$categories = getshopcategories($_GET['shopid']);
					$items = getshopitems($_GET['shopid']);
					$addcategoryerror = $errormsg;
					require('vues/vueEditshop.php');
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
