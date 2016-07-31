<div class="ordine" id="viewOrdine">
	<?php
		$carrello = array();
		if(isset($_COOKIE["carrello"])){
			$carrello = json_decode($_COOKIE["carrello"], true);
			
		}	
		$lenght = count($carrello);

		$username = $_SESSION["username"];
		$id_articolo = array();
		$prezzo = array();

		$dal = new DAL();

		for($i = 0; $i<$lenght; $i++){
			$articolo = $carrello[$i]["id"];
			$prezzoT = $carrello[$i]["prezzo"];
			$id_articolo[$i] = $articolo;
			$prezzo[$i] = $prezzoT;
		}
	
		$dal->insertOrder($username, $id_articolo, $prezzo);

		print "<h3>L'ordine è andato a buon fine! Le tue scarpe arriveranno entro 15 giorni.</h3>";
	?>
</div>
<script>
	$(document).ready(cancellaCookie("carrello"));
</script>
