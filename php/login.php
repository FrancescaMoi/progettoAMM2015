<?php
	session_start();	
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


<?php
	if (!isset($_POST['username']) || $_POST['username'] == "" ){ //controllo se esistono le post
		echo "<h3 class = \"error\">Inserire username!</h3>";
	}
	elseif (!isset($_POST['password']) || $_POST['password'] =="") {
		echo "<h3 class = \"error\">Inserire password!</h3>";
		
	}	
	else{
		include "DAL.php";
		$dal = new DAL();		

		//PRENDO LE VARIABILI DEL FORM
		$username = $_POST['username'];
		$password = $_POST['password'];


		$dal->searchUser($username,$password);

		

	//errore
	echo "<h3 id = \"erroreLogin\">Errore nome utente o password errati</h3>";

	}
?>