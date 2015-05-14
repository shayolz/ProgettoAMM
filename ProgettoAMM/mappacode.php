<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php include "loginsucess.php"; ?>
<html>
    <head>
    <body bgcolor="#000000" text="lime" link="#009933" vlink="#009933" padding="0" leftmargin="0">
        <TITLE>Mappa Magazzino</TITLE>
    </head>
    <?php
// includo i file necessari a collegarmi al db con relativo script di accesso
                include "./model/Database.php";
                
    // Non dovrebbe mai accadere!!
    if (!isset($_REQUEST['campo10'])) {
        header("location: ./accesso.php");
        return;
    }

    echo "<div id='mappa'><img src='./images/map.jpg'></div>";

// query per selezionare l`oggetto richiesto dall-utente
    $query = $mysqli->query("SELECT * FROM componenti_elettronici WHERE nome='{$_REQUEST['campo10']}'");

    $posizionescritta = 50;

    while ($res = $query->fetch_array()) {
        // x e y prendono i valori salvati nel DB tramide inseriscicode.php
        $x = $res['posizionescaffalex'];
        $y = $res['posizionescaffaley'];

        // Mostra un pallino dove e` collocato il prodotto da noi inserito
        echo "<div style=\"position:absolute;top:" . $y . "px;left:" . $x . "px\"><img src='./images/pallino.png' title='Quantita $res[quantita], id $res[id]'></div><center>";

        // per la posizione delle scritte a destra della mappa, ogni volta che ne trova una scala di 20 in basso
        $posizionescritta = $posizionescritta + 20;

        echo "<div style=position:absolute;top:" . $posizionescritta . "px;left:420px>ID: $res[id], reparto: $res[reparto], sezione: $res[sezione], quantita: $res[quantita]</div><br>";
    }

// scritte
    echo "<div style=position:absolute;top:0px;left:420px>Torna alla home page -> <html> <a href=./accesso.php>Click here</a></div>";
    echo "<div style=position:absolute;top:20px;left:420px>(Lasciare il cursore sui pallini verdi per maggiori informazioni)</div>";

    //Chiusura della connessione
    $mysqli->close();
    
    if(Database::$db_debug == "true"){
                  echo "DEBUG MODE: Connessione chiusa.<br>";
    }
    ?>

</body>
</html>
