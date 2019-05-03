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
		}elseif (!doublemailverif($mailtocheck)) {
			throw new Exception("un compte est déja associé a cette adresse mail");
		}
	}

	function checkpassword($passwordtocheck){
		return true;////////////////////////////////////
	}

	function doublemailverif(){
		return true;////////////////////////////////////
	}

	function checksizebetween($valuetocompare, $nameofvalue , $value1, $value2){
		if ($valuetocompare < $value1) {
			throw new Exception("le $nameofvalue est trop court");
			return false;
		}elseif ($valuetocompare > $value2) {
			throw new Exception("le $nameofvalue est trop long");
			return false;
		}else{
			return true;
		}
	}

	function adduser($name, $firstname, $password, $mail){
		if (checknames($name) && checknames($firstname) && checkpassword($password) && checkmail($mail)) {
			$db = getDB();
			$request = $db->prepare('INSERT INTO users(name, firstname, password, mail) VALUES(:name, :firstname, :password, :mail)');
			$request->execute(array('name' => $name,'firstname' => $firstname,'password' => $password,'mail' => $mail));
		}

	}

?>
