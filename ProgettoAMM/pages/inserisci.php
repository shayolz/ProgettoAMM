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
<?php include "./include/loginprivileges.php"; ?>
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
                <!--form part, javascript Modulo() controlla se i dati inseriti sono validi -->
                <h3>Compila il form:</h3>
                Inserisci i dati che verranno salvati nel database, il/i componente/i verranno registrati nel sistema.<br><br>
                <form onsubmit="return Modulo()" name="myForm" method="post" action="index.php?page=inseriscicode">
                    <span class="dec2">Nome</span>
                    <select size="1" name="campo1">
                        <option>Condensatore</option>
                        <option>Resistenza</option>
                        <option>Diodo</option>
                        <option>Interruttore</option>
                        <option>Transistor</option>
                        <option>Fusibile</option>
                    </select>
                    <br>
                    <span class="dec2">Reparto</span>
                    <select size="1" name="campo2">
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                    <br>
                    <span class="dec2">Sezione</span>
                    <select size="1" name="campo3">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <br>
                    <span class="dec2">Quantita</span>
                    <INPUT TYPE="text" NAME="campo4">
                    <br>

                    <INPUT TYPE="submit" id="checkimput" value="Inserisci">
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
