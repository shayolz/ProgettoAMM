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
                try {

                    // query per l`inserimento dei dati nel DB
                    $query = "DELETE FROM componenti_elettronici WHERE id = '{$_REQUEST['campo4']}'";

                    $mysqli->query($query);

                    // Nessun errore
                    // commit della query nel database
                    $mysqli->commit();
                    echo "Oggetto rimosso con successo.<br>";
                } catch (Exception $e) {

                    echo "Errore nella rimozione dell'oggetto.<br>";

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