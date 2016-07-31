<?php
    
    header('Content-Type: text/html; charset=utf-8');
    include "DAL.php";
    session_start();
    if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"]){
        $login = $_SESSION["is_logged"];
        $user = $_SESSION["type"];
    }
    //print_r($_SESSION); 
     
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="shop scarpe acessori shoese"> <!--ecc -->
        <meta name="description" content="Vendita di scarpe e aceessori online">
        <meta name="author" content="Francesca Moi">
        <link rel="shortcut icon" type="image/x-icon" href="immagini/scarpa1.jpg">
        <link href="layout.css" rel="stylesheet" type="text/css" media="screen">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jcider/latest/jcider.css">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.jcider/latest/jcider.min.js"></script>

        <link href="adipoli.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.adipoli.min.js" type="text/javascript"></script>
        <script src="js/cookies.js" type="text/javascript"></script>
        <script>
            var carrelloCookies = [];
            //console.log("carrell", carrelloCookies);
            var cookie = [];
            cookie = leggiCookie("carrello");
            if(cookie){
                console.log("cookie", JSON.parse(cookie) );
                carrelloCookies = JSON.parse(cookie);
                console.log("carrelloCookies", carrelloCookies);
            }
            
           
            function scriviCookie(nomeCookie,valoreCookie,durataCookie)
            {
              var scadenza = new Date();
              var adesso = new Date();
              scadenza.setTime(adesso.getTime() + (parseInt(durataCookie) * 60000));
              document.cookie = nomeCookie + '=' + escape(valoreCookie) + '; expires=' + scadenza.toGMTString() + '; path=/';
            }

            function leggiCookie(nomeCookie)
            {
              if (document.cookie.length > 0)
              {
                var inizio = document.cookie.indexOf(nomeCookie + "=");
                if (inizio != -1)
                {
                  inizio = inizio + nomeCookie.length + 1;
                  var fine = document.cookie.indexOf(";", inizio);
                  if (fine == -1) fine = document.cookie.length;
                  return unescape(document.cookie.substring(inizio, fine));
                }else{
                   return "";
                }
              }
              return "";
            }

            function cancellaCookie(nomeCookie)
            {
              scriviCookie(nomeCookie,'',-1);
            }

            function confermaOrdine(){
                var ordine = {};
                ordine = JSON.parse(leggiCookie("carrello"));
                console.log(ordine);
                //fare l inserimento nel db
                $.ajax({
                        type: "POST",
                        url: "view/cliente/ordini.php",
                        data: ordine,
                        context: document.body
                }).done(function() {
                    alert("L'ordine è stato spedito!");
                });

             }

                //cancellare i cookies del carrello
            function eliminaDalCarrello(){
                cancellaCookie("carrello");
                window.location.reload();
            }

        </script>

        <title>Just Shoes</title>
    </head>
    
    <body >    

        <div id="page">
            <!-- Main menu -->
            <nav>
                <?php

                    if(isset($_SESSION["is_logged"]) && $_SESSION["is_logged"])
                    {
                        if($_SESSION["type"] == 0)
                            include "view/base/menu.php";
                        else
                            include "view/amministratore/menu.php";
                    }
                    else{ 
                        include "view/base/menu.php";
                    }

                ?>
            </nav>   
            <!-- header -->
            <header>             
               <?php
                    include "view/base/header.php";//??
               ?>
            </header>

                     
             
            <div id="sidebarsx"> 
                <?php
                    include "view/base/sidebarsx.php";  //da cambiare??
                ?>
            </div> <!-- end div sidebarsx -->

            <div id="content">
                <?php
                    include "controller/controller.php";
                ?>
            </div> <!-- end div content -->
	        	
            <footer>
                <?php
                    include "view/base/footer.php";//??
               ?>
             
            </footer>

        </div> <!-- end div page -->   

    </body>

</html>
