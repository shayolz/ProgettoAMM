<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php
include_once './view/destinatario.php';
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

                <!--MENU part -->
                <?php include 'template/templateMENU.php'; ?>

            </div></div>

        <div class="colonnatd75"><div class="border"> 

                <?php
// includo i file necessari a collegarmi al db con relativo script di accesso
                include "./model/Database.php";
                
                // Se la varibile non e' stata inizializzata viene reindirizzato alla home
// Non dovrebbe mai accadere!!
                if (!isset($_REQUEST['campo11'])) {
                    header("location: ./accesso.php");
                    return;
                }


// variabili
                $totali = 0;
                $totali1 = 0;

// query per selezionare il componente scelta dall-utente
                $query = $mysqli->query("SELECT * FROM componenti_elettronici WHERE nome='{$_REQUEST['campo11']}'");

// calcolo componenti TOTALI selezionati dall`untente
                while ($res = $query->fetch_array()) {
                    $totali = $totali + $res['quantita'];
                }

// query selezionare tutti i componenti elettronici
                $query1 = $mysqli->query("SELECT * FROM componenti_elettronici");

// calcolo componenti TOTALI nell`intero magazzino
                while ($res2 = $query1->fetch_array()) {
                    $totali1 = $totali1 + $res2['quantita'];
                }

// printo risultati
                echo "Numero totale di componenti nel magazzino: $totali1<br>";
                echo "Numero totale di '{$_REQUEST['campo11']}' nel magazzino: $totali <br>";

                //Chiusura della connessione
                $mysqli->close();
                
                if(Database::$db_debug == "true"){
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
