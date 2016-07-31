
<div class="articoli" id="viewArticoli">
<?php	
	
	$dal = new DAL();
	
	$k = 0;
	
	$view = $_GET["view"];
	$result = $dal->getProduct($view);
	$lenght = count($result->list);

	$j=0;

	if($view == 'novita')
		$titolo = ucwords("Novità");
	else
		$titolo = ucwords($result->name);

	print "<p class='title'>".$titolo."</p><br/><br/><br/>";
	print "<table class='articoli' id = ".$view.">";	
	print "<tr>";
	$product = array();
	$product = $result->list;

	for($i = 0; $i<$lenght; $i++){
		$id = $product[$i]->id;
		$nome = $product[$i]->nome;
		//$tipo = $result->type;
		$descrizione = $product[$i]->descrizione;
		$immagine = $product[$i]->immagine;
		$prezzo = $product[$i]->prezzo;
		if($j>2){
			print "</tr>";
			$j = 0;
		}
		$k++;
		print "<td>";
		print "<div id='immagineScarpa'><a href='".$immagine."'><img class = 'immagineScarpa' src='".$immagine."' alt='".$nome."'></a></div>";
		print "<b><p>".utf8_decode($nome)."</p></b>";

		print "<div id='descrizione'><p>".$descrizione."</p></div>";

		print "<p>Prezzo: ".$prezzo."€</p>";

		if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"]){
			print "<form id='carrello'>
					<select id='taglia".$k."'>
						<option value = '-'>-
						<option value = '35'>35
						<option value = '36'>36
						<option value = '37'>37
						<option value = '38'>38
						<option value = '39'>39
						<option value = '40'>40
				   	</select>";

			print "<input class=\"btn_carrello\" type=\"button\" value = \"Aggiungi al carrello\" onclick=\"aggiungiCarrello(".$id.", '".$nome."', '".$immagine."', ".$prezzo.", ".$k.")\"></input>"; ///*id, nome, immagine, prezzo*/
			print "</form>";
		}

		print "</td>";
		$j++;
	}
	print "</tr>";
	print "</table>";

?>	

<script>

	$(".immagineScarpa").adipoli({
		'startEffect' : 'normal',
		'hoverEffect' : 'popout'
	});

</script>

<script>
	function aggiungiCarrello(id, nome, immagine, prezzo, idTaglia){
		var tagliaApp = document.getElementById("taglia"+ idTaglia);
		var taglia = tagliaApp.options[tagliaApp.selectedIndex].value;
		var carrello = {};
		
		carrello.id = id;
		carrello.nome = nome;
		carrello.immagine = immagine;
		carrello.prezzo = prezzo;
		carrello.taglia = taglia;		
		carrelloCookies.push(carrello); 
		carrelloJSON = JSON.stringify(carrelloCookies);
		
		//console.log("carrello =", carrelloJSON);
		
		scriviCookie("carrello", carrelloJSON, 30);
		alert("L'articolo scelto e' stato inserito nel tuo carrello!");
		var nome2 = leggiCookie("carrello");
		console.log("dopo", JSON.parse(nome2));
	}

</script>


</div>