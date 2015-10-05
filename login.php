<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		if(UserConnection($db, $_POST['email'], $_POST['password'])){

		}

			header('Location: dashboard.php');


		// TODO

		// Force user connection to access dashboard
		userConnection($db, 'git@initiation.com', 'password');
		
		
	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';