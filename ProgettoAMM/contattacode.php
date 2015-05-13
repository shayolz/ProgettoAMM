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

                // Non dovrebbe mai accadere!!
                if (!isset($_REQUEST['campo01']) || !isset($_REQUEST['campo02']) || !isset($_REQUEST['campo03'])) {
                    header("location: ./accesso.php");
                    return;
                }

                // Prima dell'inserimento controllo se l'email e' valida
                if (!filter_var($_REQUEST['campo03'], FILTER_VALIDATE_EMAIL)) {
//  il  valore non  e'  ammissibile blocco l'insert
                    echo '<script language=javascript>document.location.href="contatta.php?msg=emailerrata"</script>';
                    return;
                }

// query per l`inserimento dei dati nel DB
                // l'id e' auto incrementale da database
                $query = "INSERT INTO contatta (nome,testo,email) VALUES ('{$_REQUEST['campo01']}', '{$_REQUEST['campo02']}', '{$_REQUEST['campo03']}')";

                if ($mysqli->query($query)) {
                    echo ("Inserimento riuscito!");
                } else {
                    echo ("Errore nell'inserimento! Si prega di riprovare!");
                }

                //Chiusura della connessione
                $mysqli->close();
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
