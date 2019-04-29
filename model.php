<?php
	define("MYHOST","localhost");
	define("MYDB","monblog");
	define("MYUSER","root");
	define("MYPASS","root");

	function getBDD()
	{
		try
		{
			$db = new PDO('mysql:host='.MYHOST.';dbname='.MYDB.';charset=utf8', MYUSER, MYPASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		return $db;
	}


	function getBillets(int $n) {
		$bdd = getBDD();
		$billets = $bdd->prepare('select BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLETS order by BIL_DATE desc LIMIT 0, :maxi');
		$billets->bindParam(':maxi', $n, PDO::PARAM_INT);
		$billets->execute();
		return $billets;
	}

	function getBillet($id_billet) {
		$bdd = getBDD();
		$billet = $bdd->query("select BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLETS where BIL_ID = $id_billet");
		if ($billet->rowCount() == 1)
		return $billet->fetch();  // Accès à la première ligne de résultat
		else return FALSE;
	}

	function getCommentaires($id_billet)  {
		$bdd = getBDD();
		$commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRES where BIL_ID=?');
		$commentaires->execute(array($id_billet));
		return $commentaires;
	}

	function getNbCommentaires($id_billet)  {
		$bdd = getBDD();
		$commentaires = $bdd->prepare('select COM_ID from T_COMMENTAIRES where BIL_ID=?');
		$commentaires->execute(array($id_billet));
		return $commentaires->rowCount();
	}


	function setCommentaire($id_billet, $auteur, $contenu) {
		$bdd = getBDD();
		$billets = $bdd->prepare('insert into T_COMMENTAIRES (COM_AUTEUR, COM_CONTENU, COM_DATE, BIL_ID) values (:auteur, :contenu, now(), :id_billet)');
		if ($billets->execute(array('id_billet' => $id_billet, 'auteur' =>$auteur, 'contenu' => $contenu )))
		return TRUE;
		else
		return FALSE;
	}
