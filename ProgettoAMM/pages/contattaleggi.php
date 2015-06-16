<?php
// Evitiamo che il file venga richiesto direttamente
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
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

                // query per selezionare tutti i campi e generale l id unico
                $queryselect = $mysqli->query("SELECT id,nome FROM contatta");

                $elements = 0;

                while ($res = $queryselect->fetch_array()) {
                    $elements = $elements + 1;
                    echo "ID contact form: $res[id], Nome: $res[nome].<br>";
                }

                if ($elements != 0) {

                    echo" <br><br>
    Inserisci l`ID del contact form che si vuole leggere:<br><br>
<form onsubmit='return Modulo()' name='myForm' method='post' action='index.php?page=contattaleggiform'>
  
  <span class='dec2'>ID univoco</span>
<INPUT TYPE='text' NAME='campo4'>
<br>

<INPUT TYPE='submit' id='checkimput' value='Leggi form'>
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
?>
