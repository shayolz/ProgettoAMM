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

                // Se la varibile non e' stata inizializzata viene reindirizzato alla home
// Non dovrebbe mai accadere!!
                if (!isset($_REQUEST['campo11'])) {
                    header("location: ./pages/accesso.php");
                    return;
                }

                // variabili
                $totali = 0;
                $totali1 = 0;

                // inizializzo il prepared statement
                $stmt = $mysqli->stmt_init();

                // query
                $query = "SELECT * FROM componenti_elettronici WHERE nome = ?";

                // preparo lo statement per l'esecuzione
                $stmt->prepare($query);

                // collego i parametri della mia query con il loro tipo
                $stmt->bind_param("s", $_REQUEST['campo11']);

                // eseguiamo la query
                $stmt->execute();

                // collego i risultati della query con un insieme di variabili
                $stmt->bind_result($res_id, $res_nome, $res_reparto, $res_sezione, $res_posizionescaffalex, $res_posizionescaffaley, $res_quantita);

                // ciclo sulle righe che la query ha restituito
                while ($stmt->fetch()) {
                    // ho nelle varibili dei risultati il contenuto delle colonne
                    $totali = $totali + $res_quantita;
                }

                //liberiamo le risorse dello statement
                $stmt->close();

                // query selezionare tutti i componenti elettronici
                $query1 = $mysqli->query("SELECT * FROM componenti_elettronici");

                // calcolo componenti TOTALI nell`intero magazzino
                while ($res2 = $query1->fetch_array()) {
                    $totali1 = $totali1 + $res2['quantita'];
                }

                // mostro i risultati
                echo "Numero totale di componenti nel magazzino: $totali1<br>";
                echo "Numero totale di '{$_REQUEST['campo11']}' nel magazzino: $totali <br>";

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
