<?php

include_once './model/Utente.php';
include_once './view/ViewDescriptor.php';

$magazzino = new Utente();
if (isset($_SESSION['magazzino'])) {
    $magazzino = $_SESSION['magazzino'];
}
$vd = new ViewDescriptor();
$vd->setTitolo("Magazzino");
$vd->setTopFile('./template/templateTOP.php');
$vd->setMenuFile('./template/templateMENU.php');
$vd->setFooterFile('./template/templateFOOTER.php');