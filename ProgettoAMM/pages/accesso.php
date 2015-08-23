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
                <img src="./images/logo2.png" alt="logo" width="600" height="300" title="logo website"/> 
            </div></div>
    </div>
</div>

<br>

<!-- Footer part -->
<?php
$footer = $vd->getFooterFile();
require "$footer";
