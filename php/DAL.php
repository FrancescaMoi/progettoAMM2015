<?php
	class DAL{
		private $DB_HOST = "localhost";
		private $DB_USER = "moiFrancesca";
		private $DB_PASSWORD = "volpe8126";
		private $DB_DATABASE = "amm2015_moiFrancesca";

		public function __construct(){}

		private function dbconnect(){
			$mysqli = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_DATABASE);
			// verifico la presenza di errori 
			if($mysqli->connect_errno != 0){ // gestione errore 
				$idErrore = $mysqli->connect_errno; 
				$msg = $mysqli->connect_error; 
				error_log("Errore nella connessione al server $idErrore : $msg", 0); 
				echo "Errore nella connessione: $msg"; 
			}	
			return $mysqli;
		}

		public function console_log($data){
		  echo '<script>';
		  echo 'console.log('. json_encode( $data ) .')';
		  echo '</script>';
		}

		public function searchUser($username, $password) {
			$mysqli = $this->dbconnect();

					echo $username;
					echo $password;

			$query = "SELECT cliente.id, cliente.username 
						FROM cliente 
						WHERE username = '$username' and password = '$password'";

			$result = $mysqli->query($query);

			if($mysqli->errno > 0){
				// errore nella esecuzione della query (es. sintassi)
				error_log("Errore nella esecuzione della query
				$mysqli->errno : $mysqli->error", 0);
			}else {
				// query eseguita correttamente
				echo "<ul>\n";
				
				$obj = $result->fetch_object(); 

				echo "</ul>\n";

				if(count($obj)){
					$_SESSION["username"] = $username;
					$_SESSION["type"] = 0;
					$_SESSION["is_logged"] = 1;

					header("location: index.php");
					exit;
				}
			}

			$query = "SELECT * FROM amministratore 
						WHERE username = '$username' and password = '$password'";
			
			$result = $mysqli->query($query);

			if($mysqli->errno > 0){
				// errore nella esecuzione della query (es. sintassi)
				error_log("Errore nella esecuzione della query
				$mysqli->errno : $mysqli->error", 0);
			}else {
				// query eseguita correttamente
				echo "<ul>\n";
				
				$obj = $result->fetch_object();
				echo $obj->id;
				echo $obj->username;
				echo $obj->password;

				echo "</ul>\n";

				if(count($obj)){
					$_SESSION["username"] = $username;
					$_SESSION["type"] = 1;
					$_SESSION["is_logged"] = 1;

					header("location: index.php");
					exit;
				}
			}


			 $mysqli->close();
		}


		public function getProduct($type){
			$mysqli = $this->dbconnect();

			$productList = new stdClass();
			if($type == "novita"){
				$query = "SELECT articoli.id, articoli.nome, articoli.tipo, articoli.immagine, articoli.descrizione, articoli.prezzo
						FROM articoli
						WHERE articoli.data_inserimento > '2016-05-31'";

				$productList->name = "Novità";
			}
			else{


				$query = "SELECT tipo_articolo.id, tipo_articolo.tipo, tipo_articolo.sesso
						FROM tipo_articolo 
						WHERE tipo_articolo.nome = '$type'";

				$result = $mysqli->query($query);
			
				if($mysqli->errno > 0){
					// errore nella esecuzione della query (es. sintassi)
					error_log("Errore nella esecuzione della query
					$mysqli->errno : $mysqli->error", 0);
					return -1;
				}

				$articleType = new stdClass();
				$articleType = $result->fetch_object();
				$productList->name = $articleType->tipo." ".$articleType->sesso;
				$productList->type = $type;
			

				$query = "SELECT  articoli.id, articoli.nome, articoli.immagine, articoli.descrizione, articoli.prezzo
						FROM articoli 
						WHERE articoli.tipo = '$articleType->id'";

			}

			$result = $mysqli->query($query);
			
			if($mysqli->errno > 0){
				// errore nella esecuzione della query (es. sintassi)
				error_log("Errore nella esecuzione della query
				$mysqli->errno : $mysqli->error", 0);
				return -2;
			}
			
			$i=0;

			$productList->list = array();		
			while($obj = $result->fetch_object()){
				$productList->list[$i] = new stdClass();				
				$productList->list[$i] = $obj;


				$i++;			

			}


			$mysqli->close();
			return $productList;

		}

		public function addProduct($nome, $img, $descrizione, $tipo, $prezzo){
			$mysqli = $this->dbconnect();
		
			$data = date('Y-m-d'); 
			//echo $data;

			$query = "SELECT count(*) AS n_prodotti FROM articoli";
			$result = $mysqli->query($query);
			if($mysqli->errno > 0){
				// errore nella esecuzione della query (es. sintassi)
				error_log("Errore nella esecuzione della query
				$mysqli->errno : $mysqli->error", 0);
				return -2;
			}
			$obj = $result->fetch_object(); 
			$numeroP = $obj->n_prodotti;
			$id = $numeroP + 1;

			$query = "SELECT tipo_articolo.id, tipo_articolo.tipo, tipo_articolo.sesso
						FROM tipo_articolo 
						WHERE tipo_articolo.nome = '$tipo'";

			$result = $mysqli->query($query);
		
			if($mysqli->errno > 0){
				// errore nella esecuzione della query (es. sintassi)
				error_log("Errore nella esecuzione della query
				$mysqli->errno : $mysqli->error", 0);
				return -1;
			}
			$obj = $result->fetch_object(); 
			$id_tipo = $obj->id;

			//inserting data order
			$toInsert = "INSERT INTO articoli
						(id, nome, immagine, descrizione, tipo, prezzo, data_inserimento)
						VALUES
						('$id', '$nome', '$img', '$descrizione', '$id_tipo', '$prezzo', '$data')";


			//declare in the order variable
			$result = $mysqli->query($toInsert);	//order executes
		

			// Chiusura della connessione 
			
			//return $result;
			$mysqli->close();
			
			
		}


		public function getAllProduct(){
			$mysqli = $this->dbconnect();


			
			$query = "SELECT articoli.nome, articoli.immagine, articoli.descrizione, articoli.prezzo
					FROM articoli";

			$result = $mysqli->query($query);
			
			if($mysqli->errno > 0){
				// errore nella esecuzione della query (es. sintassi)
				error_log("Errore nella esecuzione della query
				$mysqli->errno : $mysqli->error", 0);
				return -2;
			}
			
			$i=0;

			$productList= array();		
			while($obj = $result->fetch_object()){
				$productList[$i] = new stdClass();				
				$productList[$i] = $obj;

				$i++;			

			}

			$mysqli->close();
			return $productList;
		}


		public function insertOrder($username, $id_articoli, $prezzi){
			$mysqli = $this->dbconnect();
			$result = false;

			$data = date('Y-m-d'); 
			//echo $data;

			$query = "SELECT cliente.id FROM cliente WHERE cliente.username = '$username'";
			$result = $mysqli->query($query);
			if($mysqli->errno > 0){
				// errore nella esecuzione della query (es. sintassi)
				error_log("Errore nella esecuzione della query
				$mysqli->errno : $mysqli->error", 0);
				return -2;
			}
			$obj = $result->fetch_object(); 
			$id_cliente = $obj->id;


			for($i = 0; $i<count($id_articoli); $i++){
				$query = "SELECT count(*) AS n_ordini FROM ordine";
				$result = $mysqli->query($query);
				if($mysqli->errno > 0){
					// errore nella esecuzione della query (es. sintassi)
					error_log("Errore nella esecuzione della query
					$mysqli->errno : $mysqli->error", 0);
					return -2;
				}
				$obj = $result->fetch_object(); 
				$numeroO = $obj->n_ordini;
				$id_ordine = $numeroO + 1;
				$id_articolo = $id_articoli[$i];
				$prezzo = $prezzi[$i];

				//inserting data order
				$toInsert = "INSERT INTO ordine
							(id, data, prezzo, id_cliente, id_articolo)
							VALUES
							('$id_ordine', '$data', '$prezzo', '$id_cliente', '$id_articolo')";


				//declare in the order variable
				$result = $mysqli->query($toInsert);	//order executes
			}
			// Chiusura della connessione 
			$mysqli->close();
		}
	}
?>