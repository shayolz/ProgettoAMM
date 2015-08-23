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
                if (!isset($_REQUEST['campo1'])) {
                    header("location: ./pages/accesso.php");
                    return;
                }

                // setto l'autocommit a false
                $mysqli->autocommit(false);

                // query per selezionare tutti i campi e generale l id unico
                $queryselect = $mysqli->query("SELECT * FROM componenti_elettronici WHERE nome='{$_REQUEST['campo1']}'");

                $elements = 0;

                // calcolo del nuovo id unico
                while ($res = $queryselect->fetch_array()) {
                    $elements = $elements + 1;
                    echo "ID: $res[id], Reparto: $res[reparto], Sezione: $res[sezione], Quantita: $res[quantita]. <br>";
                }

                if ($elements != 0) {

                    echo" <br><br>
    Inserisci l`ID del prodotto da rimuovere:<br><br>
<form onsubmit='return Modulo()' name='myForm' method='post' action='index.php?page=rimuovicodeid'>
  
  <span class='dec2'>ID univoco</span>
<INPUT TYPE='text' NAME='campo4'>
<br>

<INPUT TYPE='submit' id='checkimput' value='Rimuovi dal database'>
  </form>
    ";
                } else {
                    echo"Non sono presenti questi componenti all`interno del magazzino";
                }

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
