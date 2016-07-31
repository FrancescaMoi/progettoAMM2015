<?php
	if(isset($_GET['view'])){
		switch($_GET['view']){
			case 'home' : {
				include "view/base/home.php";
				break;
			}
			case 'login' : {
				include "view/base/formInput.php";
				break;
			}
			case 'novita' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'infraditoU' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'sneakersU' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'sandaliU' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'sportU' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'infraditoD' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'sneakersD' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'sandaliD' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'stivaliD' : {
				include "view/base/Nav/articoli.php";
				break;
			}
			case 'descrizione' : {
				include "view/base/Sidebar/descrizione.php";
				break;
			}
			case 'pagamenti' : {
				include "view/base/Sidebar/pagamenti.php";
				break;
			}
			case 'spedizioni' : {
				include "view/base/Sidebar/spedizioni.php";
				break;
			}
			case 'guidaTaglie' : {
				include "view/base/Sidebar/guidaTaglieD.php";
				break;
			}
			case 'guidaTaglieU' : {
				include "view/base/Sidebar/guidaTaglieU.php";
				break;
			}
			case 'aggiungi' : {
				include "view/amministratore/formAggiungiArticolo.php";
				break;
			}
			case 'aggiungiArticolo' : {
				include "view/amministratore/aggiungiArticolo.php";
				include "view/amministratore/formAggiungiArticolo.php";
				break;
			}
			case 'visualizza' : {
				include "view/amministratore/visualizzaArticoli.php";
				break;
			}
			case 'carrello' : {
				include "view/cliente/viewCarrello.php";
				break;
			}
			case 'ordine' : {
				include "view/cliente/ordini.php";
				break;
			}

		}
	}else {
		include "view/base/home.php";
	}

	
?>