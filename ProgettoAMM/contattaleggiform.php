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
<!--tabella css -->  
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
                if (!isset($_REQUEST['campo4'])) {
                    header("location: ./accesso.php");
                    return;
                }

// query per l`inserimento dei dati nel DB
                $queryselect = $mysqli->query("SELECT * FROM contatta WHERE id = '{$_REQUEST['campo4']}'");
                $elements = 0;
                while ($res = $queryselect->fetch_array()) {
                    $elements = $elements + 1;
                    echo "ID contact form: $res[id], Nome: $res[nome], Email: $res[email]<br>";
                    echo "Testo: <div id='testocolorato'>$res[testo].</div> <br>";
                }

                if ($elements == 0) {
                    echo 'Non ci sono testi con questo id univoco!';
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
