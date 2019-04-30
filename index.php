<?php
	require 'model.php';
	setlocale(LC_TIME, "fr"); // Passe l’heure locale en zone FR


	if (isset($_GET['action']))
	{
		// $action = strip_tags($_GET['action']);
		// try {
		// 	switch($action) {
    //
		// 		case 'single':
		// 		try {
		// 			if (isset($_GET['id']))
		// 			{
		// 				$bdd=getbdd();
		// 				$id_billet = (int)strip_tags($_GET['id']);
		// 				$billet=getBillet($id_billet);
		// 				$coms=getCommentaires($id_billet);
		// 				$coms=getCommentaires($id_billet);
		// 				$nbcommentaires = getNbCommentaires($id_billet);
		// 				require ('vues/vueBillet.php');
		// 			}
		// 			else throw new Exception("Aucun billet correspondant");
		// 		} catch (Exception $e)
		// 		{
		// 			$msgErreur = $e->getMessage();
		// 			require ('vues/vueErreur.php');
		// 		}
    //
		// 		break;
    //
		// 		case 'setcommentaire':
		// 		try {
		// 			if (isset($_GET['id'], $_POST['auteur'], $_POST['contenu'])
		// 			&& !empty($auteur=strip_tags($_POST['auteur']))
		// 			&& !empty($contenu=strip_tags($_POST['contenu'])))
		// 			{
		// 				$bdd=getbdd();
		// 				$id_billet = (int)strip_tags($_GET['id']);
		// 				$billet=getBillet($id_billet);
		// 				setCommentaire ($id_billet,$auteur,$contenu);
		// 				$coms=getCommentaires($id_billet);
		// 				$nbcommentaires = getNbCommentaires($id_billet);
		// 				require ('vues/vueBillet.php');
		// 			}
		// 			else throw new Exception("Il manque des paramètres");
		// 		} catch (Exception $e)
		// 		{
		// 			$msgErreur = $e->getMessage();
		// 			require ('vues/vueErreur.php');
		// 		}
		// 		break;
    //
		// 		default :
		// 		throw new Exception("Aucune action correspodnante");
		// 		break;
		// 	}
		// }
		// catch (Exception $e)
		// {
		// 	$msgErreur = $e->getMessage();
		// 	require ('vues/vueErreur.php');
		// }
	}
	else {

      $pageTitle = "Mabel - Acceuil";
      $pageDescription = "Explorez des milliers de boutiques en ligne et créez la votres en quelques clics.";
			require('vues/vueAccueil.php');
		}

		include 'included_contents/included_scripts.php';
	?>
