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
                if (!isset($_REQUEST['campo01']) || !isset($_REQUEST['campo02']) || !isset($_REQUEST['campo03'])) {
                    header("location: ./index.php?page=accesso");
                    return;
                }

                $Object = new Utente();
                $Object->setEmail($_REQUEST['campo03']);

                // inizializzo il prepared statement
                $stmt = $mysqli->stmt_init();

                // query
                $query = "INSERT INTO contatta (nome,testo,email) VALUES (?, ?, ?)";

                // preparo lo statement per l'esecuzione
                $stmt->prepare($query);

                // collego i parametri della mia query con il loro tipo
                $stmt->bind_param("sss", $_REQUEST['campo01'], $_REQUEST['campo02'], $_REQUEST['campo03']);

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