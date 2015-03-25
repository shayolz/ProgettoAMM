<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<!-- TOP part -->
<?php include 'template/templateTOP.php'; ?>
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
                include "./include/config.php";



// query per l`inserimento dei dati nel DB
                $query = "DELETE FROM componenti_elettronici WHERE id = '{$_POST['campo4']}'";

                if (mysql_query($query)) {
                    echo ("Prodotto rimosso con successo dal database!");
                } else {
                    echo ("Errore! Controllate se l`id esiste!");
                }

// chiudiamo la connessione con il db
                mysql_close();
                ?>

            </div>
        </div>
    </div>
</div>

<br>

<!-- Footer part -->
<?php include 'template/templateFOOTER.php'; ?>
