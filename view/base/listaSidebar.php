<?php

if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"])
{
	if($_SESSION["type"] == 0){
		print " <li><a class=\"sidebar\" href=\"index.php?view=carrello\">Il mio carrello <img id = 'carrello' src='immagini/carrello.png'></a></li> ";
	}
	print " <li><a class=\"sidebar\" href=\"logout.php\">Logout</a></li> ";
}
else{ 
	print " <li><a class=\"sidebar\" href=\"index.php?view=login\">Login</a></li> ";
}

?>