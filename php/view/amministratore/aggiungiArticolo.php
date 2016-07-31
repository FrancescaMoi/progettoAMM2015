<div id="aggiungiArticolo">
	<?php
		$dal = new DAL();
		if (!isset($_POST['nome']) || $_POST['nome'] == "" ){
			$message = "Inserire il nome dell'articolo!";
		}
		elseif (!isset($_POST['img']) || $_POST['img'] =="") {
			$message = "Inserire il link dell'immagine!";
		}
		elseif (!isset($_POST['descrizione']) || $_POST['descrizione'] =="") {
			$message = "Inserire la descrizione!";	
		}
		elseif (!isset($_POST['tipo']) || $_POST['tipo'] =="") {
			$message = "Inserire tipo!";
		}
		elseif (!isset($_POST['prezzo']) || $_POST['prezzo'] =="") {
			$message = "Inserire il prezzo!";	
		}
		else{
		
			//PRENDO LE VARIABILI DEL FORM
			$nome = $_POST['nome'];
			$img = $_POST['img'];
			$descrizione = $_POST['descrizione'];
			$tipo = $_POST['tipo'];
			$prezzo = $_POST['prezzo'];

			$dal->addProduct($nome, $img, $descrizione, $tipo, $prezzo);
				print("<h1>L'inserimento dell articolo è avvenuto con successo!</h1>");
				$message="";
		}
		if($message!=""){
			echo "<script type='text/javascript'>alert('$message');</script>";

		}
	?>
</div>

