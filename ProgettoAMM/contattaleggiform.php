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

// Non dovrebbe mai accadere!!
if(!isset($_REQUEST['campo4'])){
header("location: ./accesso.php");
return;
}

// query per l`inserimento dei dati nel DB
                $queryselect = mysql_query("SELECT * FROM contatta WHERE id = '{$_REQUEST['campo4']}'");
$elements = 0;
                while ($res = mysql_fetch_array($queryselect)) {
                    $elements = $elements + 1;
                    echo "ID contact form: $res[id], Nome: $res[nome].<br>";
                                    echo "Testo: $res[testo].<br>";
                                    
                }

if ($elements == 0) {
    echo 'Non ci sono testi con questo id univoco!';}
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
