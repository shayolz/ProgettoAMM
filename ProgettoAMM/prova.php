<?php
include_once './view/ViewDescriptor.php';
include_once './destinatario.php';
$top= $vd->getTopFile();
require "$top";

$left = $vd->getFooterFile();
require "$left";
?>

