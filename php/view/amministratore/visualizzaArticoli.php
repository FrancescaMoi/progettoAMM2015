<div class="articoli" id="viewArticoliAmministratore">
<?php	
	$dal = new DAL();
	$result = $dal->getAllProduct();
	$lenght = count($result);

	$j=0;

	print "<h4>ARTICOLI AGGIUNTI</h4><br/><br/><br/>";
	print "<table class='articoli' id = 'visualizzaArticoli'>";	
	print "<tr>";

	$product = array();
	$product = $result;

	for($i = 0; $i<$lenght; $i++){
		$nome = $product[$i]->nome;
		$descrizione = $product[$i]->descrizione;
		$immagine = $product[$i]->immagine;
		$prezzo = $product[$i]->prezzo;
		if($j>2){
			print "</tr>";
			$j = 0;
		}
		print "<td>";
		print "<div id='immagineScarpa'><a href=".$immagine."><img class = 'immagineScarpa' src=".$immagine." alt='".$nome."'></a></div>";
		print "";
		print "<b><p>".utf8_decode($nome)."</p></b>";
		print "<div id='descrizione'><p>".$descrizione."</p></div>";
		print "<p>Prezzo: ".$prezzo."€</p>";
		print "</td>";
		$j++;
	}
	print "</tr>";
	print "</table>";

?>	

</div>