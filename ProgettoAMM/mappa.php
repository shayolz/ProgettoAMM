<?php session_start(); ?>
<?php include "include/errorReport.php"; ?>
<?php
include_once './view/destinatario.php';
include_once './view/ViewDescriptor.php';
?>
<?php include "loginsucess.php"; ?>
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

                <h3>Seleziona componente:</h3>
                Seleziona il componente che verra' mostrato all'interno del magazzino:<br><br>

                <form method="post" action="mappacode.php">
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
