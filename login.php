<?php
	//session_start();	
	if (isset($_SESSION["type"]) && $_SESSION["type"]>0) {
		if($_SESSION["type"] == 0){
			$_SESSION["type"] = 0;
			$_SESSION["is_logged"] = 1;
		}

		if($_SESSION["type"] == 1){
			$_SESSION["type"] = 1;
			$_SESSION["is_logged"] = 1;
		}
	}
	
?>
<div id="login">
<?php
	if (!isset($_POST['username']) || $_POST['username'] == "" ){ //controllo se esistono le post
		$message = "Inserire lo username!";
	}
	elseif (!isset($_POST['password']) || $_POST['password'] =="") {
		$message = "Inserire la password!";		
	}	
	else{
		//include "DAL.php";
		$dal = new DAL();	

		//PRENDO LE VARIABILI DEL FORM
		$username = $_POST['username'];
		$password = $_POST['password'];

		$dal->searchUser($username,$password);
		
		if(!isset($_SESSION["is_logged"]) || !$_SESSION["is_logged"]){
			$message = "Errore: nome utente o password errati!";
		}
	}
	echo "<script type='text/javascript'>alert('$message');</script>";		
	include "view/base/formInput.php"
?>
</div>
