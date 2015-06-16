<?php
// Evitiamo che il file venga richiesto direttamente
if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
  echo '<script language=javascript>document.location.href="../index.php?page=accesso"</script>';
  exit();
}
?>
<?php
include_once './view/magazzino.php';
include_once './view/ViewDescriptor.php';
?>
<?php include "./include/loginsuccess.php"; ?>
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

                <h3>Seleziona componente:</h3>
                Seleziona il componente che verra' mostrato all'interno del magazzino:<br><br>

                <form method="post" action="index.php?page=mappacode">
                    <select size="1" name="campo10">
                        <option>Condensatore</option>
                        <option>Resistenza</option>
                        <option>Diodo</option>
                        <option>Interruttore</option>
                        <option>Transistor</option>
                        <option>Fusibile</option>
                    </select><br>

                    <INPUT TYPE="submit" VALUE="Mostra nella mappa">
                </form>

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
