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
					$shops = getonlineshops();
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
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								closeshop($_GET['shopid']);
								$shops = getshops($_SESSION['id']);
								require('vues/vueMyshops.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							throw new Exception("erreur");
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeshoppicture':
					if (isset($_SESSION['id'])){
						if (!empty($_FILES['shoppicture']['name']) && isset($_GET['shopid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changeshoppicture("shoplogo", $_GET['shopid'], $_FILES['shoppicture']);
								$shops = getshops($_SESSION['id']);
								require('vues/vueMyshops.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							throw new Exception("erreur");
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeshopheader':
					if (isset($_SESSION['id'])){
						if (isset($_GET['shopid']) && isset($_POST['color'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changeheadercolor($_GET['shopid'], $_POST['color']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							throw new Exception("erreur");
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeaboutuspicture':
					if (isset($_SESSION['id'])){
						if (!empty($_FILES['aboutuspicture']['name']) && isset($_GET['shopid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changeshoppicture("aboutuspicture", $_GET['shopid'], $_FILES['aboutuspicture']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							throw new Exception("erreur");
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeaboutustext':
					if (isset($_SESSION['id'])){
						if (isset($_GET['shopid']) && isset($_POST['aboutustext'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changeaboutustext($_GET['shopid'], $_POST['aboutustext']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							throw new Exception("erreur");
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeshopstatus':
					if (isset($_SESSION['id'])){
						if (isset($_GET['shopid']) && isset($_GET['newstatus'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changeshopstatus($_GET['shopid'], $_GET['newstatus']);
								if (isset($_GET['from'])) {
									redirect($from);
								}else {
									$shops = getshops($_SESSION['id']);
									require('vues/vueMyshops.php');
								}
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							throw new Exception("erreur");
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'editshop':
					if (isset($_SESSION['id'])){
						if (isset($_GET['shopid'])){
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'showshop':
				if (isset($_GET['shopid'])){
					if (shopexist($_GET['shopid'])) {
						if (isonline($_GET['shopid'])) {
							require('included_contents/loadShop.php');
						}elseif(isset($_SESSION['id'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								require('included_contents/loadShop.php');
							}else {
								throw new Exception("cette boutique ne vous appartiens pas");
							}
						}else {
							throw new Exception("désolé cette boutique a été fermée");
						}
					}else {
						throw new Exception("cette boutique n'existe pas");
					}
				}else {
					throw new Exception("erreur");
				}
				break;

				case 'showitem':
				if (isset($_GET['shopid']) && isset($_GET['itemid'])){
					if (shopexist($_GET['shopid']) && itembelongtoshop($_GET['shopid'], $_GET['itemid'])) {
						if (isonline($_GET['shopid'])) {
							require('included_contents/loadItem.php');
						}elseif(isset($_SESSION['id'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								require('included_contents/loadItem.php');
							}else {
								throw new Exception("cette boutique ne vous appartiens pas");
							}
						}else {
							throw new Exception("désolé cette boutique n'est pas en ligne");
						}
					}else {
						throw new Exception("cette objet n'existe pas dans cette boutique");
					}
				}else {
					throw new Exception("erreur");
				}
				break;

				case 'addsection':
					if (isset($_SESSION['id'])){
						if (isset($_GET['shopid']) && isset($_GET['shopid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								addsection($_GET['shopid'], $_GET['section']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'removesection':
					if (isset($_SESSION['id'])){
						if (isset($_GET['shopid']) && isset($_GET['shopid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								removesection($_GET['shopid'], $_GET['section']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
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
						if (isset($_GET['shopid']) && isset($_POST['itemname']) && isset($_POST['categoryid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id']) && categorybelongtoshop($_GET['shopid'], $_POST['categoryid'])) {
								additem($_GET['shopid'], $_POST['itemname'], $_POST['categoryid']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'addcategory':
					if (isset($_SESSION['id'])) {
						if (isset($_POST['categoryname']) && isset($_GET['shopid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								addcategory($_GET['shopid'], $_POST['categoryname']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'changepictureproduct':
					if (isset($_SESSION['id'])){
						if (!empty($_FILES['itempicture']['name']) && isset($_GET['itemid']) && isset($_GET['shopid']) && isset($_GET['imgnumber'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changepictureitem($_GET['itemid'], $_GET['shopid'], $_GET['imgnumber'] ,$_FILES['itempicture']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'changepictureitem':
					if (isset($_SESSION['id'])){
						if (!empty($_FILES['itempicture']['name']) && isset($_GET['itemid']) && isset($_GET['shopid']) && isset($_GET['imgnumber'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changepictureitem($_GET['itemid'], $_GET['shopid'], $_GET['imgnumber'] ,$_FILES['itempicture']);
								require('included_contents/loadEdititem.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							$shops = getshops($_SESSION['id']);
							require('vues/vueMyshops.php');
						}
					}else {
						require('vues/vueConnexion.php');
					}
				break;

				case 'deleteitem':
					if (isset($_SESSION['id'])) {
						if (isset($_GET['itemid']) && isset($_GET['shopid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								deleteitem($_GET['shopid'], $_GET['itemid']);
								require('included_contents/loadEditShop.php');
							}else {
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							require('included_contents/loadEditShop.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'deletecategory':
					if (isset($_SESSION['id'])) {
						if (isset($_GET['categoryid']) && isset($_GET['shopid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								deletecategory($_GET['categoryid']);
								require('included_contents/loadEditShop.php');
							}else{
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							require('included_contents/loadEditShop.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'edititem':
					if (isset($_SESSION['id'])) {
						if (isset($_GET['shopid']) && isset($_GET['itemid'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id']) && itembelongtoshop($_GET['shopid'], $_GET['itemid'])) {
								require('included_contents/loadEdititem.php');
							}else{
								throw new Exception("ce magasin ne vous appartiens pas");
							}
						}else {
							require('included_contents/loadEditShop.php');
						}
					}else{
						require('vues/vueConnexion.php');
					}
				break;

				case 'changeitemdata':
					if (isset($_SESSION['id'])) {
						if (isset($_GET['shopid']) && isset($_GET['itemid']) && isset($_GET['datatoedit']) && isset($_POST['data'])) {
							if (shopbelongtouser($_GET['shopid'], $_SESSION['id'])) {
								changeitemdata($_GET['shopid'], $_GET['itemid'], $_GET['datatoedit'], strip_tags($_POST['data']));
								require('included_contents/loadEdititem.php');
							}else {
								throw new Exception("une erreur est survenue");
							}
						}else {
							require('included_contents/loadEdititem.php');
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
					$additemerror = $errormsg;
					$itemadding = $_POST['categoryid'];
					require('included_contents/loadEditShop.php');
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
