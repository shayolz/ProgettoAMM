<?php
// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    echo '<script language=javascript>document.location.href="../index.php?page=accesso"</script>';
    exit();
}
?>
<?php include "./include/loginsuccess.php"; ?>
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

    // inizializzo il prepared statement
    $stmt = $mysqli->stmt_init();

    // query
    $query = "SELECT * FROM componenti_elettronici WHERE nome = ?";

    // preparo lo statement per l'esecuzione
    $stmt->prepare($query);

    // collego i parametri della mia query con il loro tipo
    $stmt->bind_param("s", $_REQUEST['campo10']);

    // eseguiamo la query
    $stmt->execute();

    // collego i risultati della query con un insieme di variabili
    $stmt->bind_result($res_id, $res_nome, $res_reparto, $res_sezione, $res_posizionescaffalex, $res_posizionescaffaley, $res_quantita);

    $posizionescritta = 50;

    // ciclo sulle righe che la query ha restituito
    while ($stmt->fetch()) {
        // x e y prendono i valori salvati nel DB tramide inseriscicode.php
        $x = $res_posizionescaffalex;
        $y = $res_posizionescaffaley;

        // Mostra un pallino dove e` collocato il prodotto da noi inserito
        echo "<div style=\"position:absolute;top:" . $y . "px;left:" . $x . "px\"><img src='./images/pallino.png' title='Quantita $res_quantita, id $res_id'></div><center>";

        // per la posizione delle scritte a destra della mappa, ogni volta che ne trova una scala di 20 in basso
        $posizionescritta = $posizionescritta + 20;

        echo "<div style=position:absolute;top:" . $posizionescritta . "px;left:420px>ID: $res_id, reparto: $res_reparto, sezione: $res_sezione, quantita: $res_quantita</div><br>";
    }


    // scritte
    echo "<div style=position:absolute;top:0px;left:420px>Torna alla home page -> <html> <a href=index.php?page=accesso>Click here</a></div>";
    echo "<div style=position:absolute;top:20px;left:420px>(Lasciare il cursore sui pallini verdi per maggiori informazioni)</div>";

    // liberiamo le risorse dello statement
    $stmt->close();

    if (Database::$db_debug == "true") {
        echo "DEBUG MODE: Connessione chiusa.<br>";
    }
    ?>

</body>
</html>
