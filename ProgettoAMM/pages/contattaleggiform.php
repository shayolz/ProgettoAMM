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

                echo" <input type='button' value='Mostra dettagli contatto' onClick='mostradati()' > <br><br>";

                // inizializzo variabile
                $elements = 0;

                // inizializzo il prepared statement
                $stmt = $mysqli->stmt_init();

                // query
                $query = "SELECT * FROM contatta WHERE id = ?";

                // preparo lo statement per l'esecuzione
                $stmt->prepare($query);

                // collego i parametri della mia query con il loro tipo
                $stmt->bind_param("i", $_REQUEST['campo4']);

                // eseguiamo laquery
                $stmt->execute();

                // collego i risultati della query con un insieme di variabili
                $stmt->bind_result($res_id, $res_nome, $res_testo, $res_email);
                // ciclo sulle righe che la query ha restituito
                while ($stmt->fetch()) {
                    $elements = $elements + 1;

                    $_SESSION['id'] = $res_id;
                    $_SESSION['nome'] = $res_nome;
                    $_SESSION['email'] = $res_email;

                    // ho nelle varibili dei risultati il contenuto delle colonne
                    // echo "ID contact form: $res_id, Nome: $res_nome, Email: $res_email<br>";
                    echo "Testo: <div id='testocolorato'>$res_testo.</div> <br>";
                }

                // Controllo se ci sono risultati
                if ($elements == 0) {
                    echo 'Non ci sono testi con questo id univoco!';
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
