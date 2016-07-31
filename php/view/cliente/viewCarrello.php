
<div class="carrello" id="viewCarrello">
	<?php	
		$carrello = array();
		if(isset($_COOKIE["carrello"])){
			$carrello = json_decode($_COOKIE["carrello"], true);
			
		}	
		$lenght = count($carrello);

		$totale = 0;

		print "<h2 class='title'>Il mio carrello</h2><br/>";

		if($lenght == 0){
			print "<p>Il tuo carrello è ancora vuoto! Guarda la nostra collezione e fai il tuo ordine. In questa sezione potrai avere un riepilogo dei tuoi ordini.</p>";
		}
		else{
			print "<form>";

			print "<br/><table class='carrello' id = 'miocarrello'>";
			print "<tr> 
						<th>  </th>
					    <th>Nome prodotto</th> 				    
					    <th>Taglia</th>
					    <th>Prezzo</th>				    
				   </tr>";	
		   	$ordineObj = new stdClass();
		   	$ordine = array();
		   	


			for($i = 0; $i<$lenght; $i++){

				$id = $carrello[$i]["id"];
				$nome =  $carrello[$i]["nome"];
				$immagine = $carrello[$i]["immagine"];
				$prezzo = $carrello[$i]["prezzo"];
				$taglia =  $carrello[$i]["taglia"];
				$totale = $totale + $prezzo;

				print "<tr>";
				print "<td><img class = 'immagineMini' src='".$immagine."' alt='".$nome."'></td>";
				print "<td><b><p>".$nome."</p></b></td>";
				print "<td><p>".$taglia."</p></td>";
				print "<td><p>".$prezzo."€</p></td>";
				print "</tr>";
				
				$ordine[$i] = $id;
			
			}


			$ordineObj->ordini = $ordine;
			$pippo = json_encode($ordineObj);
			print "<tr><td></td><td></td>";
			print "<td><p id='strtot'>Totale prezzo: </p></td>";
			print "<td><p id='tot'>".$totale."€</p></td>";
			print "</tr>";
			
			print "</table>";

			print "<input id='btn_conferma' class='carrelloB' type='button' value = 'Conferma ordine' onclick=\"document.location.href='index.php?view=ordine'\"></input><br/>";
			print "<input id='btn_elimina' class='carrelloB' type='button' value = 'Elimina ordine' onclick='eliminaDalCarrello()'></input>";
			print "</form>";
		}
	?>	

	<script>

		$(".immagineScarpa").adipoli({
			'startEffect' : 'normal',
			'hoverEffect' : 'popout'
		});

	</script>

</div>