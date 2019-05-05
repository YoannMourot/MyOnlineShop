<?php
	define("MYHOST","localhost");
	define("MYDB","mabel");
	define("MYUSER","root");
	define("MYPASS","");


	function getDB() {
		try
		{
			$db = new PDO('mysql:host='.MYHOST.';dbname='.MYDB.';charset=utf8', MYUSER, MYPASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		return $db;
	}

	function checknames($nametocheck){
		return checksizebetween(strlen($nametocheck), "nom ou prénom" , 2, 50);
	}

	function checkmail($mailtocheck){
		if (!checksizebetween(strlen($mailtocheck), "mail" , 4, 100)) {
			return false;
		}elseif(!filter_var($mailtocheck, FILTER_VALIDATE_EMAIL)) {
			throw new Exception("la structure de votre adresse mail est anormale");
			return false;
		}elseif (!doublemailverif($mailtocheck)) {
			throw new Exception("un compte est déja associé a cette adresse mail");
			return false;
		}else {
			return true;
		}
	}

	function checkpassword($passwordtocheck, $passwordtocheck2){
		if (!checksizebetween(strlen($passwordtocheck), "mot de passe" , 5, 100)) {
			return false;
		}elseif ($passwordtocheck !== $passwordtocheck2) {
			throw new Exception("La validatation de votre mot de passe est différent");
			return false;
		}else {
			return true;
		}
	}

	function doublemailverif($mailtocheck){
		$db = getDB();
		$request = $db->prepare('SELECT mail FROM users WHERE mail = ?');
		$request->execute(array($mailtocheck));
		if($request->rowCount() != 0) {
		    throw new Exception("Un compte est déja enregistré avec cette adresse mail");
				return false;
		}else {
			return true;
		}
	}

	function checksizebetween($valuetocompare, $nameofvalue , $value1, $value2){
		if ($valuetocompare < $value1) {
			throw new Exception("le $nameofvalue est trop court<br> il doit faire au minimum $value1 caractères");
			return false;
		}elseif ($valuetocompare > $value2) {
			throw new Exception("le $nameofvalue est trop long<br> il doit faire au maximum $value2 caractères");
			return false;
		}else{
			return true;
		}
	}

	function adduser($name, $firstname, $mail, $password, $password2){
		if (checknames($name) && checknames($firstname) && checkmail($mail) && checkpassword($password, $password2)) {
			$db = getDB();
			$request = $db->prepare('INSERT INTO users(name, firstname, password, mail) VALUES(:name, :firstname, :password, :mail)');
			$request->execute(array('name' => $name,'firstname' => $firstname,'password' => $password,'mail' => $mail));
			return true;
		}else {
			return false;
		}
	}

?>
