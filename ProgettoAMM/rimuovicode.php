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

// query per selezionare tutti i campi e generale l id unico
                $queryselect = mysql_query("SELECT * FROM componenti_elettronici WHERE nome='{$_POST['campo1']}'");

                $elements = 0;

// calcolo del nuovo id unico
                while ($res = mysql_fetch_array($queryselect)) {
                    $elements = $elements + 1;
                    echo "ID: $res[id], Reparto: $res[reparto], Sezione: $res[sezione], Quantita: $res[quantita]. <br>";
                }

                if ($elements != 0) {

                    echo" <br><br>
    Inserisci l`ID del prodotto da rimuovere:<br><br>
<form onsubmit='return Modulo()' name='myForm' method='post' action='rimuovicodeid.php'>
  
  <span class='dec2'>ID univoco</span>
<INPUT TYPE='text' NAME='campo4'>
<br>

<INPUT TYPE='submit' id='checkimput' value='Rimuovi dal database'>
  </form>
    ";
                } else {
                    echo"Non sono presenti questi componenti all`interno del magazzino";
                }
//if (mysql_query ($query)){
//   echo ("Inserimento riuscito!");
//}
//else{
                //  echo ("Errore nell'inserimento! Si prega di riprovare!");
//}
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
