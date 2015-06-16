<?php
// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    echo '<script language=javascript>document.location.href="../index.php?page=accesso"</script>';
    exit();
}
?>
<?php
include_once './view/magazzino.php';
include_once './view/ViewDescriptor.php';
?>
<!-- TOP part -->
<?php
$top = $vd->getTopFile();
require "$top";
?>

<div class="tabellapiccola">
    <div class="rigatr">
        <div class="colonnatd25"><div class="border"> 

                <!-- Menu part -->
                <?php
                $menu = $vd->getMenuFile();
                require "$menu";
                ?> 

            </div></div>

        <div class="colonnatd75"><div class="border"> 

                <?php
// includo i file necessari a collegarmi al db con relativo script di accesso
                include "./model/Database.php";
// variabili
                $posizionex = 0;
                $posizioney = 0;
                $randomValuex = rand(-50, 50);
                $randomValuey = rand(-50, 50);

// In base al reparto e alla sezione selezionato al componente vengono dati valori x/y prestabiliti 
// e viene sommato un valore random per far si che gli oggetti poi mostrati nella mappa
// non siano tutti nello stesso punto
// Reparto A sezione 1 - 2 - 3
                if ("{$_REQUEST['campo2']}" == "A" && "{$_REQUEST['campo3']}" == "1") {
                    $posizionex = 70 + $randomValuex;
                    $posizioney = 230 + $randomValuey;
                } else if ("{$_REQUEST['campo2']}" == "A" && "{$_REQUEST['campo3']}" == "2") {
                    $posizionex = 70 + $randomValuex;
                    $posizioney = 360 + $randomValuey;
                } else if ("{$_REQUEST['campo2']}" == "A" && "{$_REQUEST['campo3']}" == "3") {
                    $posizionex = 70 + $randomValuex;
                    $posizioney = 510 + $randomValuey;
                }

// Reparto B sezione 1 - 2 - 3
                if ("{$_REQUEST['campo2']}" == "B" && "{$_REQUEST['campo3']}" == "1") {
                    $posizionex = 210 + $randomValuex;
                    $posizioney = 230 + $randomValuey;
                } else if ("{$_REQUEST['campo2']}" == "B" && "{$_REQUEST['campo3']}" == "2") {
                    $posizionex = 210 + $randomValuex;
                    $posizioney = 360 + $randomValuey;
                } else if ("{$_REQUEST['campo2']}" == "B" && "{$_REQUEST['campo3']}" == "3") {
                    $posizionex = 210 + $randomValuex;
                    $posizioney = 510 + $randomValuey;
                }

// Reparto C sezione 1 - 2 - 3
                if ("{$_REQUEST['campo2']}" == "C" && "{$_REQUEST['campo3']}" == "1") {
                    $posizionex = 330 + $randomValuex;
                    $posizioney = 230 + $randomValuey;
                } else if ("{$_REQUEST['campo2']}" == "C" && "{$_REQUEST['campo3']}" == "2") {
                    $posizionex = 330 + $randomValuex;
                    $posizioney = 360 + $randomValuey;
                } else if ("{$_REQUEST['campo2']}" == "C" && "{$_REQUEST['campo3']}" == "3") {
                    $posizionex = 330 + $randomValuex;
                    $posizioney = 510 + $randomValuey;
                }

                // inizializzo il prepared statement
                $stmt = $mysqli->stmt_init();

                // query
                $query = "INSERT INTO componenti_elettronici (nome,reparto,sezione,quantita,posizionescaffalex,posizionescaffaley) VALUES (?, ?, ?, ?, $posizionex, $posizioney)";

                // preparo lo statement per l'esecuzione
                $stmt->prepare($query);

                // collego i parametri della mia query con il loro tipo
                $stmt->bind_param("ssii", $_REQUEST['campo1'], $_REQUEST['campo2'], $_REQUEST['campo3'], $_REQUEST['campo4']);

                // eseguiamo la query e controlliamo se c'è un errore
                if ($stmt->execute()) {
                    echo ("Inserimento riuscito! </br>");
                } else {
                    echo ("Errore nell'inserimento! Si prega di riprovare!</br>");
                }

                //liberiamo le risorse dello statement
                $stmt->close();

                if (Database::$db_debug == "true") {
                    echo "DEBUG MODE: Connessione chiusa.<br>";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<br>

<!-- Footer part -->
<?php
$footer = $vd->getFooterFile();
require "$footer";
?>

