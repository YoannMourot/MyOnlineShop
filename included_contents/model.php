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
		if (strlen($nametocheck)<4) {
			throw new Exception("le nom est trop court");
			return false;
		}else {
			return true;
		}
	}

	function checkmail(){
		return true;////////////////////////////////////
	}

	function checkpassword(){
		return true;////////////////////////////////////
	}

	function adduser($name, $firstname, $password, $mail){
		if (checknames($name) && checkmail() && checkpassword()) {
			$db = getDB();
			$request = $db->prepare('INSERT INTO users(name, firstname, password, mail) VALUES(:name, :firstname, :password, :mail)');
			$request->execute(array('name' => $name,'firstname' => $firstname,'password' => $password,'mail' => $mail));
		}

	}

	function doublemailverif(){
		return true;////////////////////////////////////
	}


?>
