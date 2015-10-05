<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {



	// TODO

	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];

	if(isUsernameAvailable($db, $username) === true) {
		if(isEmailAvailable($db, $email) === true) {
			userRegistration($db, $username, $email, $password);
			$_SESSION['message'] = "bravo !";
			header('Location: login.php');

		} else {
			$_SESSION['message'] = "email deja utilisé";
			header('Location: register.php');
		}
	} else {
		$_SESSION['message'] = "username deja utilisé";
		header('Location: register.php');
	}
}else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}