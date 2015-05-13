<?php

include_once './model/Destinatario.php';
include_once './view/ViewDescriptor.php';

$destinatario = new Destinatario();
if (isset($_SESSION['destinatario'])) {
    $destinatario = $_SESSION['destinatario'];
}
$vd = new ViewDescriptor();
$vd->setTitolo("Magazzino");
$vd->setTopFile('template/templateTOP.php');
$vd->setMenuFile('template/templateMENU.php');
$vd->setFooterFile('template/templateFOOTER.php');
$vd->setContentFile('template/contentDestinatario.php');
?>

