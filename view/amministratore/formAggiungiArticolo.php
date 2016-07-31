<div id = "form-aggiungi">
	<h4>AGGIUNTA ARTICOLO<br/><br/><br/></h4>
        <br/>
        <form id = "addForm" action="index.php?view=aggiungiArticolo" method="post">
            <label for="nome">Nome articolo</label>
            <br/>
            <input type="text" id="nome" name="nome" value="Black Alicia" size="30" maxlength="30"/>
            <br/><br/><br/>
            <label for="img">Link immagine</label>
            <br/>
            <input type="text" id="img" name="img" value="../../ProgettoAMM2015/immagini/articoliDonna/scarpa15.jpg" size="50" maxlength="300"/>
            <br/><br/><br/>
            <label for="descrizione">Descrizione</label>
            <br/>
            <textarea id="descrizione" name="descrizione" value="Stivali alti fino al ginocchio, neri con zip laterale." cols="50" rows="5" maxlength="300"></textarea>
            <br/><br/><br/>
            <label for="tipo">Tipo</label>
            <br/>
            <input type="text" id="tipo" name="tipo" value="stivaliD" size="30" maxlength="30"/>
            <br/><br/><br/>
            <label for="prezzo">Prezzo</label>
            <br/>
            <input type="text" id="prezzo" name="prezzo" value="49.00" size="30" maxlength="30"/>
            <br/><br/><br/>
            
            <input type = "submit" id = "submitAddArticle" name = "submit" value = "Salva">
        </form> <!-- end form per il login -->
</div>
