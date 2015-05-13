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

// query per selezionare tutti i campi e generale l id unico
                $queryselect = "SELECT id FROM componenti_elettronici";
                $result = $mysqli->query($queryselect);
                $ultimoId = 0;
                $nuovoId = 0;

// calcolo del nuovo id unico
                while ($res = $result->fetch_array()) {
                    if ($ultimoId < $res['id']) {
                        $ultimoId = $res['id'];
                    }
                }

                $nuovoId = $ultimoId + 1;

                // query per l`inserimento dei dati nel DB
                $query = "INSERT INTO componenti_elettronici (id, nome,reparto,sezione,quantita,posizionescaffalex,posizionescaffaley) VALUES ('$nuovoId', '{$_REQUEST['campo1']}', '{$_REQUEST['campo2']}', '{$_REQUEST['campo3']}','{$_REQUEST['campo4']}', $posizionex, $posizioney)";

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
