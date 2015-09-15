<?php
// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == filter_input(INPUT_SERVER, 'SCRIPT_FILENAME', FILTER_SANITIZE_STRING)) {
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
<!--tabella css -->  
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

                // Non dovrebbe mai accadere!!
                if (!isset($_REQUEST['campo4'])) {
                    header("location: ./pages/accesso.php");
                    return;
                }

                // inizializzo il prepared statement
                $stmt = $mysqli->stmt_init();

                // query
                $query = "DELETE FROM componenti_elettronici WHERE id = ?";

                // preparo lo statement per l'esecuzione
                $stmt->prepare($query);

                // collego i parametri della mia query con il loro tipo
                $stmt->bind_param("i", $_REQUEST['campo4']);

                // eseguiamo la query e controlliamo se c'è un errore
                if ($stmt->execute()) {
                    echo ("Operazione eseguita con successo! </br>");

                    // Nessun errore
                    // commit della query nel database
                    $mysqli->commit();
                } else {
                    echo ("Errore nell'inserimento! Si prega di riprovare!</br>");

                    // faccio il rollback delle queries precedenti
                    $mysqli->rollback();
                }

                // risetto l'auto commit a true
                $mysqli->autocommit(true);

                //Chiusura della connessione
                $mysqli->close();

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
