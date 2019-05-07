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
		if (!checksizebetween(strlen($mailtocheck), "mail" , 4, 150)) {
			throw new Exception("- la structure de votre adresse mail est anormale<br>");
			return false;
		}elseif(!filter_var($mailtocheck, FILTER_VALIDATE_EMAIL)) {
			throw new Exception("- la structure de votre adresse mail est anormale<br>");
			return false;
		}elseif (!doublemailverif($mailtocheck)) {
			throw new Exception("- un compte est déja associé a cette adresse mail<br>");
			return false;
		}else {
			return true;
		}
	}

	function checkpassword($passwordtocheck, $passwordtocheck2){
		if (!checksizebetween(strlen($passwordtocheck), "mot de passe" , 5, 100)) {
			return false;
		}elseif ($passwordtocheck !== $passwordtocheck2) {
			throw new Exception("- Les deux mots de passes sont différents<br>");
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
		    throw new Exception("- Un compte est déja enregistré avec cette adresse mail<br>");
				return false;
		}else {
			return true;
		}
	}

	function checksizebetween($valuetocompare, $nameofvalue , $value1, $value2){
		if ($valuetocompare < $value1) {
			throw new Exception("- le $nameofvalue est trop court, il doit faire au minimum $value1 caractères<br>");
			return false;
		}elseif ($valuetocompare > $value2) {
			throw new Exception("- le $nameofvalue est trop long, il doit faire au maximum $value2 caractères<br>");
			return false;
		}else{
			return true;
		}
	}

	function adduser($name, $firstname, $mail, $password, $password2){
		if (checknames($name) && checknames($firstname) && checkmail($mail) && checkpassword($password, $password2)) {
			$db = getDB();
			$request = $db->prepare('INSERT INTO users(name, firstname, password, mail) VALUES(:name, :firstname, :password, :mail)');
			$request->execute(array('name' => $name, 'firstname' => $firstname, 'password' => password_hash($password, PASSWORD_DEFAULT), 'mail' => $mail));
			return true;
		}else {
			throw new Exception("l'adresse mail ou le mot de passe ne correspond pas");
		}
	}

	function connect($mail, $password){
		$db = getDB();
		$request = $db->prepare('SELECT id, name, firstname, profilepic, mail, password FROM users WHERE mail = :mail');
		$request->execute(array('mail' => $mail));
		$request = $request->fetch();
		if (password_verify($password, $request['password'])) {
			$_SESSION['id'] = $request['id'];
			$_SESSION['name'] = $request['name'];
			$_SESSION['firstname'] = $request['firstname'];
			$_SESSION['mail'] = $request['mail'];
			$_SESSION['profilepic'] = $request['profilepic'];
			return true;
		}else {
			throw new Exception("l'adresse mail ou le mot de passe ne correspond pas");
		}
	}

	function disconnect(){
		// Unset all of the session variables.
		$_SESSION = array();
		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}
		// Finally, destroy the session.
		session_destroy();
	}

	function redirect($from){
		switch ($from) {
			case 'Explorer les boutiques':
				require('vues/vueExploreShops.php');
			break;

			case 'showcreateshop':
				require('vues/vueCreateShop.php');
			break;

			default:
				require('vues/vueAccueil.php');
			break;
		}
	}

?>
