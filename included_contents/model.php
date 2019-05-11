<?php

define("MYHOST","db5000069846.hosting-data.io");
define("MYDB","dbs64451");
define("MYUSER","dbu217399");
define("MYPASS","Yoannmdu06!");
	// define("MYHOST","");
	// define("MYDB","mabel");
	// define("MYUSER","root");
	// define("MYPASS","");


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
		checksizebetween(strlen($mailtocheck), "mail" , 4, 150);
		if(!filter_var($mailtocheck, FILTER_VALIDATE_EMAIL)) {
			throw new Exception("- la structure de votre adresse mail est anormale<br>");
		}elseif (!doublemailverif($mailtocheck)) {
			throw new Exception("- un compte est déja associé a cette adresse mail<br>");
		}else {
			return true;
		}
	}

	function checkpassword($passwordtocheck, $passwordtocheck2){
		checksizebetween(strlen($passwordtocheck), "mot de passe" , 5, 100);
		if ($passwordtocheck !== $passwordtocheck2) {
			throw new Exception("- Les deux mots de passes sont différents<br>");
		}else {
			return true;
		}
	}

	function doublemailverif($mailtocheck){
		$db = getDB();
		$request = $db->prepare('SELECT mail FROM users WHERE mail = ?');
		$request->execute(array($mailtocheck));
		if($request->rowCount() != 0) {
		    return false;
		}else {
			return true;
		}
	}

	function checksizebetween($valuetocompare, $nameofvalue , $value1, $value2){
		if ($valuetocompare < $value1) {
			throw new Exception("- le $nameofvalue est trop court, il doit faire au minimum $value1 caractères<br>");
		}elseif ($valuetocompare > $value2) {
			throw new Exception("- le $nameofvalue est trop long, il doit faire au maximum $value2 caractères<br>");
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

	function sendpasswordtoken($mail){
		$db = getDB();
		$request = $db->prepare('SELECT firstname, mail FROM users WHERE mail = :mail');
		$request->execute(array('mail' => $mail));//verif que l'adresse mail existe sinon renvoyer erreur "l'addresse mail n'existe pas" si oui envoyer le mail avec le hash en token (pas secure si la base est piratée)
		$request = $request->fetch();
		if ($mail == $request['mail']) {
			$token = generateRandomString(10);
			$settoken = $db->query('UPDATE users SET token = \''.password_hash($token, PASSWORD_DEFAULT).'\' WHERE mail = \''.$mail.'\'');
			sendmailpwchange($request['firstname'], $mail, $token);
		}else {
			throw new Exception("ce mail n'existe pas");
		}
	}

	function sendmailpwchange($firstname, $mail, $token){
    $subject = 'changement de mot de passe';
    $message = "Bonjour $firstname<br>Pour définir un nouveau mot de passe clique sur ce lien<br><br>http://ralyse.com/index.php?action=showsetnewpw&mail=$mail"."&token=$token";
 		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: Mabel <yoann.mourot@ralyse.com>' . "\r\n";
		if (!mail($mail, $subject, $message, $headers)) {
			throw new Exception("erreur lors de l'envoi du mail");
		}
	}

	function changemail($newmail){
		checkmail($newmail);
		$db = getDB();
		$token = generateRandomString(10);
		$settoken = $db->query('UPDATE users SET token = \''.password_hash($token, PASSWORD_DEFAULT).'\' WHERE mail = \''.$_SESSION['mail'].'\'');
		sendmailwithtoken($_SESSION['firstname'], $newmail, $token);
		$_SESSION['tmpmail'] = $newmail;
	}

	function sendmailwithtoken($firstname, $newmail, $token){
		$subject = 'Changement d\'adresse mail';
		$message = "Bonjour $firstname<br>Pour confirmer le changement d'adresse mail merci de rentrer le code <h1>$token</h1> dans l'encadré indiqué sur la page web";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: Mabel <yoann.mourot@ralyse.com>' . "\r\n";
		if (!mail($newmail, $subject, $message, $headers)) {
			throw new Exception("erreur lors de l'envoi du mail");
		}
	}

	function setnewmail($oldmail, $newmail){
		$db = getDB();
		$sql = "UPDATE users SET mail='$newmail', token='' WHERE mail='$oldmail'";
		$request = $db->prepare($sql);
		$request->execute();
		if ($request->rowCount()!= 1) {
			throw new Exception("erreur lors de la modification de l'adresse mail");
		}
		$_SESSION['mail'] = $_SESSION['tmpmail'];
	}

	function changepassword($mail, $password1, $password2){
		checkpassword($password1, $password2);
		$db = getDB();
		$password = password_hash($password1, PASSWORD_DEFAULT);
		$sql = "UPDATE users SET password='$password', token='' WHERE mail='$mail'";
		$request = $db->prepare($sql);
		$request->execute();
		if ($request->rowCount()!= 1) {
			throw new Exception("erreur lors de la modification du mot de passe");
		}
	}

	function changename($mail, $name){
		$db = getDB();
		checksizebetween(strlen($name), "nom" , 2, 50);
		$sql = "UPDATE users SET name='$name' WHERE mail='$mail'";
		$request = $db->prepare($sql);
		$request->execute();
		if ($request->rowCount()!= 1) {
			throw new Exception("erreur lors de la modification du nom");
		}
		$_SESSION['name'] = $name;
	}

	function changefirstname($mail, $firstname){
			$db = getDB();
			checksizebetween(strlen($firstname), "Prénom" , 2, 50);
			$sql = "UPDATE users SET name='$firstname' WHERE mail='$mail'";
			$request = $db->prepare($sql);
			$request->execute();
			if ($request->rowCount()!= 1) {
				throw new Exception("erreur lors de la modification du prénom");
			}
			$_SESSION['firstname'] = $firstname;
	}

	function changepp($mail, $profilepic){
		checkppisok($profilepic);
		$newfilename = $_SESSION['name'] . generateRandomString(10) .'.'. pathinfo($profilepic["name"],PATHINFO_EXTENSION);
		$target_file = "./images/userspp/" . $newfilename;
		if (!move_uploaded_file($profilepic["tmp_name"], $target_file)) {
			throw new Exception("une erreur s'est produite lors de l'upload de l'image");
		}
		$db = getDB();
		$requestoldpic = $db->prepare('SELECT profilepic FROM users WHERE mail = :mail');
		$requestoldpic->execute(array('mail' => $mail));
		$requestoldpic = $requestoldpic->fetch();

		$sql = "UPDATE users SET profilepic='$newfilename' WHERE mail='$mail'";
		$request = $db->prepare($sql);
		$request->execute();
		if ($request->rowCount()!= 1) {
			throw new Exception("erreur lors de la modification de l'image de profil");
		}
		unlink("./images/userspp/".$requestoldpic['profilepic']);
		$_SESSION['profilepic'] = $newfilename;
	}

	function checkppisok($profilepic){
		$imageFileType = strtolower(pathinfo($profilepic["name"],PATHINFO_EXTENSION));//récupère l'extension du fichier
		if(!getimagesize($profilepic["tmp_name"])) {//check image is really an image
			throw new Exception("le fichier n'est pas une image");
		}elseif ($profilepic["size"] > 500000) {
			throw new Exception("l'image est trop grande");
		}elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
		}
	}

	function checkaccounttoken($mail, $token){
		$db = getDB();
		$request = $db->prepare('SELECT mail, token FROM users WHERE mail = :mail');
		$request->execute(array('mail' => $mail));
		$request = $request->fetch();
		if (password_verify($token, $request['token'])) {
			return true;
		}else {
			return false;
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

	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
