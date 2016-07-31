<div id = "homepage">


<script>
	$(document).ready(function() {
	    $('.slider').jcider({
	        looping: true, // For looping
		    visibleSlides: 1, // Visible no. of slides
		    variableWidth: false, // For variable width
		    variableHeight: true, // For variable height
		    fading: false, // For fading/sliding effect
		    easing: 'cubic-bezier(.694, .0482, .335, 1)', // For easing
		    transitionDuration: 400, // Duration of slide transition
		    autoplay: false, // Duh...
		    slideDuration: 3000, // Duration between each slide change in autoplay
		    controls: true, // For visibility of nav-arrows
		    controlsWrapper: 'div.jcider-nav', // Element for nav wrapper
		    controlsLeft: ['span.jcider-nav-left', ''], // Element for nav-left 
		    controlsRight: ['span.jcider-nav-right', ''], // Element for nav-right
		    pagination: true, // For visibility of pagination
		    paginationWrapper: 'div.jcider-pagination', // Element for pagination wrapper
		    paginationPoint: 'div.jcider-pagination-point' // Element for pagination points*/
	    });
	});
</script>	

	<?php 

		
		if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"]){
			switch($_SESSION["type"]){						
				case 0: {
					print "<p>Benvenuto ".$_SESSION["username"].". Questa e' la tua sezione personale dove potrai effettuare i tuoi ordini e vedere tutti i nostri fantastici modelli.</p><p>Buona navigazione.</p>";
					break;
				}
				case 1: {
					print "<p>Benvenuto ".$_SESSION["username"].". Questa e' la tua sezione personale da cui potrai inserire i nuovi articoli.<br/>Buona navigazione!</p>";
					break;
				}
			}
		}
		else{
			print "<h3>Benvenuto su Just Shoes!</h3>";
					
		}
	?>

    <section class="slider">
        <div>
        	 <div> <img id="immagine4" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe6.jpg"> </div>   
            <div> <img id="immagine1" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe2.png"> </div>     	
            <div> <img id="immagine2" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe1.jpg"> </div>
            <div> <img id="immagine3" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe3.jpg"> </div>            
                    
            <div> <img id="immagine5" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe9.jpg"> </div>
        </div>
    </section>

     <section class="slider">
        <div>

            <div> <img id="immagine6" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe10.jpg"> </div>
            <div> <img id="immagine7" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe11.jpg"> </div>
            <div> <img id="immagine8" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe4.jpg"> </div>     	
            <div> <img id="immagine10" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe7.jpg"> </div>
            <div> <img id="immagine11" title="nuoviArrivi" alt="NUOVI ARRIVI" src="immagini/home/scarpe8.jpg"> </div>
        </div>
    </section>
</div>
