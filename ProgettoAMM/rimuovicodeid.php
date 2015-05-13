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
                $query = "DELETE FROM componenti_elettronici WHERE id = '{$_REQUEST['campo4']}'";

                if ($mysqli->query($query)) {
                    echo ("Prodotto rimosso con successo dal database!");
                } else {
                    echo ("Errore! Controllate se l`id esiste!");
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
